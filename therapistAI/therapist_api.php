<?php
// therapist_api.php
header("Content-Type: application/json");



$data = json_decode(file_get_contents("php://input"), true);
$prompt = $data["prompt"] ?? "";
$systemMessage = [
    "role" => "system",
    "content" => "You are a compassionate and understanding therapist. Your purpose is to listen empathetically and provide thoughtful, supportive responses to users seeking emotional or mental health guidance. Use a calm, non-judgmental tone."
];


if ($prompt) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api.openai.com/v1/chat/completions");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Authorization: Bearer $apiKey",
        "Content-Type: application/json"
    ]);
    
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
        "model" => "gpt-4o-mini",
        "messages" => [
            $systemMessage,
            ["role" => "user", "content" => $prompt]
        ],
        "max_tokens" => 200,
    ]));

    $response = curl_exec($ch);
    curl_close($ch);

    if ($response) {
        $responseData = json_decode($response, true);   
        $content = $responseData['choices'][0]['message']['content'] ?? '';
        echo json_encode(["reply" => $content]);
        exit;
    }
}

echo json_encode(["reply" => "I couldn't process your message."]);