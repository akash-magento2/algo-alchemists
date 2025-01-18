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