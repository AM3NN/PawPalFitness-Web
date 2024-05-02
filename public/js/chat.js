// Get references to DOM elements
const chatForm = document.getElementById('chat-form');
const chatMessage = document.getElementById('chat-message');
const chatContent = document.getElementById('chat-content');
const sendButton = document.getElementById('send-button');

// Function to handle sending a message
const sendMessage = () => {
    const prompt = chatMessage.value.trim();

    if (prompt !== '') {
        // Send an AJAX POST request to the server
        fetch(chatForm.action, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: `prompt=${encodeURIComponent(prompt)}`
        })
        .then(response => response.json())
        .then(data => {
            // Display the response in the chat content
            const responseElement = document.createElement('p');
            responseElement.textContent = 'ChatGPT: ' + data.response;
            chatContent.appendChild(responseElement);

            // Clear the input field
            chatMessage.value = '';

            // Scroll to the bottom of the chat content
            chatContent.scrollTop = chatContent.scrollHeight;
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
};

// Add event listeners for the send button and Enter key
sendButton.addEventListener('click', (event) => {
    event.preventDefault(); // Prevent form submission
    sendMessage();
});

chatMessage.addEventListener('keyup', (event) => {
    if (event.key === 'Enter') {
        event.preventDefault(); // Prevent form submission
        sendMessage();
    }
});
