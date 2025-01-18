<?php 
    require_once('../header.php');
    require_once('../menu.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TherapistAI Chatbot</title>
    <style>
        /* Define the color scheme */
        :root {
            --background-color: #f0f4f8;
            --default-color: #444444;
            --heading-color: #2a2c39;
            --accent-color: #ef6603;
            --surface-color: #ffffff;
            --contrast-color: #ffffff;
        }

        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #ef6603, #f0f4f8);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: var(--default-color);
        }

        /* Chat Container */
        #chat-container {
            width: 90%;
            max-width: 600px;
            height: 700px;
            background-color: var(--surface-color);
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        /* Chat Box */
        #chat-box {
            padding: 20px;
            flex-grow: 1;
            overflow-y: auto;
            background-color: #f9f9f9;
            border-bottom: 1px solid #ddd;
            scrollbar-width: thin;
        }

        .message {
            margin: 10px 0;
            padding: 12px 16px;
            border-radius: 8px;
            animation: fadeIn 0.3s ease-in-out;
            font-size: 18px;
        }

        .user-message {
            background-color: #e8f0fe;
            color: #333;
            align-self: flex-end;
            text-align: right;
        }

        .bot-message {
            background-color: var(--accent-color);
            color: var(--contrast-color);
            align-self: flex-start;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* User Input Section */
        #user-input {
            display: flex;
            background-color: var(--contrast-color);
            padding: 15px;
            border-top: 1px solid #ddd;
        }

        #message-input {
            flex-grow: 1;
            border: 1px solid #ddd;
            border-radius: 20px;
            padding: 12px 20px;
            font-size: 16px;
            outline: none;
            color: var(--default-color);
        }

        #message-input::placeholder {
            color: #aaa;
        }

        #send-button {
            background-color: var(--accent-color);
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            margin-left: 10px;
            color: var(--contrast-color);
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #send-button:hover {
            background-color: #cc5302;
        }

        /* Mobile Optimization */
        @media (max-width: 600px) {
            #chat-container {
                width: 95%;
                height: 80%;
            }

            #message-input {
                font-size: 14px;
            }

            #send-button {
                width: 45px;
                height: 45px;
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <div id="chat-container">
        <div id="chat-box">
            <!-- Messages will appear here -->
        </div>
        <div id="user-input">
            <input type="text" id="message-input" placeholder="How are you feeling today?">
            <button id="send-button">➤</button>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", initiateChat);
        document.getElementById("send-button").addEventListener("click", sendMessage);

        const chatBox = document.getElementById("chat-box");

        // Display an initial message from the therapist
        async function initiateChat() {
            const initialMessage = await getBotResponse(
                "Please start by introducing yourself as a therapist and ask the user how they are feeling today."
            );
            displayMessage(initialMessage, "bot-message");
        }

        // Send a message when the user interacts with the input
        async function sendMessage() {
            const userInput = document.getElementById("message-input");
            const userMessage = userInput.value.trim();

            if (userMessage) {
                // Display user's message
                displayMessage(userMessage, "user-message");
                userInput.value = "";

                // Send the message to the AI API and display the response
                const botResponse = await getBotResponse(userMessage);
                displayMessage(botResponse, "bot-message");
            }
        }

        // Display messages in the chatbox
        function displayMessage(message, className) {
            const messageElement = document.createElement("div");
            messageElement.className = `message ${className}`;
            messageElement.innerText = message;
            chatBox.appendChild(messageElement);
            chatBox.scrollTop = chatBox.scrollHeight; // Scroll to the latest message
        }

        // Fetch the bot's response from the server
        async function getBotResponse(message) {
            try {
                const response = await fetch("therapist_api.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify({ prompt: message }),
                });

                const data = await response.json();
                return data.reply || "I'm here to help you.";
            } catch (error) {
                console.error("Error fetching bot response:", error);
                return "Sorry, I couldn't process your message. Please try again.";
            }
        }
    </script>
</body>
</html>
