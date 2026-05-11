<?php
declare(strict_types=1);

function extract_micro_id(string $input): ?string {
    $input = trim($input);
    if ($input === '') return null;

    if (preg_match('#([0-9A-Fa-f]{8})\s*$#', $input, $m)) {
        return strtoupper($m[1]);
    }
    return null;
}

function fetch_certificate(string $microId): array {
    $url = env('C3RT_API_URL');
    $user = env('C3RT_API_USER');
    $token = env('C3RT_API_TOKEN');

    if (!$url || !$user || !$token) {
        return ['ok' => false, 'error' => 'Missing API credentials'];
    }

    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_POST => true,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 15,
        CURLOPT_POSTFIELDS => http_build_query([
            'api_user' => $user,
            'api_token' => $token,
            'op' => 'get_certificate',
            'microID' => $microId,
        ]),
    ]);
    $body = curl_exec($ch);
    $err = curl_error($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($body === false) {
        return ['ok' => false, 'error' => "cURL: $err"];
    }
    if ($code !== 200) {
        return ['ok' => false, 'error' => "HTTP $code", 'raw' => $body];
    }

    $data = json_decode($body, true);
    if (!is_array($data)) {
        return ['ok' => false, 'error' => 'Invalid JSON', 'raw' => $body];
    }
    if (($data['status'] ?? '') !== 'ok') {
        return ['ok' => false, 'error' => 'API status not ok', 'raw' => $body];
    }
    $result = $data['result'][0] ?? null;
    if (!$result) {
        return ['ok' => false, 'error' => 'not_found'];
    }
    return ['ok' => true, 'cert' => $result];
}

function cert_type(array $cert): string {
    $root = $cert['root'] ?? '';
    if ($root === 'arts_modigliani_folder') return 'cartella';
    if ($root === 'arts_modigliani') return 'quadro';
    return 'unknown';
}
