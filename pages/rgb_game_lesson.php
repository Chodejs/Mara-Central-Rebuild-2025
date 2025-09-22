<main class="flex-grow">
    <div class="container mx-auto px-6 py-12">
        <div class="mb-8">
            <a href="index.php?p=rgb_game" class="text-teal-400 hover:text-teal-300 transition-colors">&larr; Back to the Game</a>
        </div>

        <article class="max-w-4xl mx-auto">
            <header class="mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Interactive Lesson: Build the RGB Color Game</h1>
                <p class="text-lg text-gray-400">A step-by-step guide to creating a fun, interactive color guessing game with vanilla JavaScript.</p>
            </header>

            <!-- Introduction -->
            <section class="mb-12">
                <h2 class="text-3xl font-bold text-teal-400 mb-4 border-b border-gray-700 pb-2">Introduction</h2>
                <p class="text-gray-300 leading-relaxed">
                    Welcome! In this lesson, we're going to build the RGB Color Game from scratch. This project is fantastic for practicing fundamental JavaScript concepts like DOM manipulation, event handling, and logic. By the end, you'll have a fully functional game and a much better understanding of how to make web pages interactive. Let's get started!
                </p>
            </section>

            <!-- Step 1: HTML -->
            <section class="mb-12">
                <h2 class="text-3xl font-bold text-teal-400 mb-4 border-b border-gray-700 pb-2">Step 1: The HTML Structure</h2>
                <p class="text-gray-300 leading-relaxed mb-6">
                    First, we need the skeleton of our application. The HTML provides the structure for the header, the control bar (we call it a "stripe"), and the color squares. We use `div` elements with specific IDs so our JavaScript can easily find and manipulate them later. The styling is done with Tailwind CSS classes for a modern, clean look without writing separate CSS files.
                </p>
                <div class="bg-gray-800 rounded-xl shadow-2xl">
                    <div class="flex justify-between items-center p-4 bg-gray-900 rounded-t-xl border-b border-gray-700">
                        <h3 class="text-xl font-bold text-white">game.html</h3>
                        <button onclick="copyCode('htmlCodeBlock')" class="bg-teal-500 hover:bg-teal-600 text-white font-semibold px-4 py-2 rounded-lg transition-colors text-sm">Copy Code</button>
                    </div>
                    <div class="p-4">
                        <pre class="language-html text-white bg-gray-900 p-4 rounded-lg overflow-x-auto"><code id="htmlCodeBlock"><?php echo htmlspecialchars('
<div class="max-w-3xl mx-auto bg-gray-800 rounded-xl shadow-2xl">
    <!-- Header -->
    <div id="gameHeader" class="bg-teal-500 text-white text-center py-6 px-4 rounded-t-xl transition-colors duration-500">
        <h1 class="text-2xl md:text-4xl font-bold uppercase tracking-wider">The Great<br>
            <span id="colorDisplay" class="text-4xl md:text-6xl font-black">RGB</span><br>
            Color Game
        </h1>
    </div>
    <!-- Stripe / Controls -->
    <div id="stripe" class="bg-gray-900 h-16 text-center flex items-center justify-center space-x-4 md:space-x-8">
        <button id="reset" class="text-teal-400 font-semibold uppercase tracking-wider hover:text-white transition-colors px-4 py-2 rounded-md hover:bg-teal-500">New Colors</button>
        <span id="message" class="text-white font-semibold uppercase tracking-wider w-1/3 text-center"></span>
        <div class="space-x-2">
                <button id="easyBtn" class="text-teal-400 font-semibold uppercase tracking-wider hover:text-white transition-colors px-4 py-2 rounded-md hover:bg-teal-500">Easy</button>
                <button id="hardBtn" class="text-white font-semibold uppercase tracking-wider px-4 py-2 rounded-md bg-teal-500">Hard</button>
        </div>
    </div>
    <!-- Squares Container -->
    <div id="container" class="p-4 md:p-6">
        <div class="grid grid-cols-3 gap-4">
            <div class="square w-full aspect-square rounded-lg shadow-md cursor-pointer transition-all duration-300"></div>
            <div class="square w-full aspect-square rounded-lg shadow-md cursor-pointer transition-all duration-300"></div>
            <div class="square w-full aspect-square rounded-lg shadow-md cursor-pointer transition-all duration-300"></div>
            <div class="square w-full aspect-square rounded-lg shadow-md cursor-pointer transition-all duration-300"></div>
            <div class="square w-full aspect-square rounded-lg shadow-md cursor-pointer transition-all duration-300"></div>
            <div class="square w-full aspect-square rounded-lg shadow-md cursor-pointer transition-all duration-300"></div>
            <div class="square w-full aspect-square rounded-lg shadow-md cursor-pointer transition-all duration-300"></div>
            <div class="square w-full aspect-square rounded-lg shadow-md cursor-pointer transition-all duration-300"></div>
            <div class="square w-full aspect-square rounded-lg shadow-md cursor-pointer transition-all duration-300"></div>
        </div>
    </div>
</div>
                        '); ?></code></pre>
                    </div>
                </div>
            </section>

            <!-- Step 2: JavaScript -->
            <section class="mb-12">
                <h2 class="text-3xl font-bold text-teal-400 mb-4 border-b border-gray-700 pb-2">Step 2: The JavaScript Brains</h2>
                <p class="text-gray-300 leading-relaxed mb-6">
                    Now for the magic. The JavaScript brings our game to life. We'll break it down into smaller, manageable pieces.
                </p>

                <h3 class="text-2xl font-semibold text-white mb-3 mt-8">2a. Setup & Variables</h3>
                <p class="text-gray-300 mb-4">
                    First, we declare variables to hold the game state (like the number of squares) and to store references to our HTML elements. Using `document.querySelectorAll` and `document.getElementById` is key to connecting our script to the page.
                </p>
                <div class="bg-gray-800 rounded-xl shadow-2xl">
                     <div class="flex justify-between items-center p-4 bg-gray-900 rounded-t-xl border-b border-gray-700">
                        <h3 class="text-xl font-bold text-white">game.js (Part 1)</h3>
                        <button onclick="copyCode('jsCodeBlock1')" class="bg-teal-500 hover:bg-teal-600 text-white font-semibold px-4 py-2 rounded-lg transition-colors text-sm">Copy Code</button>
                    </div>
                    <div class="p-4">
                        <pre class="language-js text-white bg-gray-900 p-4 rounded-lg overflow-x-auto"><code id="jsCodeBlock1"><?php echo htmlspecialchars('
let numSquares = 9;
let colors = []; // An array to store the random colors
let pickedColor; // The correct color the user needs to guess

// --- Selectors for HTML elements ---
const squares = document.querySelectorAll(".square");
const colorDisplay = document.getElementById("colorDisplay");
const messageDisplay = document.querySelector("#message");
const gameHeader = document.querySelector("#gameHeader");
const resetButton = document.querySelector("#reset");
const easyBtn = document.querySelector("#easyBtn");
const hardBtn = document.querySelector("#hardBtn");

// Run the main initializer function when the script loads
init();
                        '); ?></code></pre>
                    </div>
                </div>

                <h3 class="text-2xl font-semibold text-white mb-3 mt-8">2b. The `init` Function</h3>
                 <p class="text-gray-300 mb-4">
                    An `init` (initialize) function is a great way to organize our setup code. It calls other functions to set up the mode buttons (Easy/Hard), the color squares, and then calls `reset()` to start the first round of the game.
                </p>
                <div class="bg-gray-800 rounded-xl shadow-2xl">
                     <div class="flex justify-between items-center p-4 bg-gray-900 rounded-t-xl border-b border-gray-700">
                        <h3 class="text-xl font-bold text-white">game.js (Part 2)</h3>
                        <button onclick="copyCode('jsCodeBlock2')" class="bg-teal-500 hover:bg-teal-600 text-white font-semibold px-4 py-2 rounded-lg transition-colors text-sm">Copy Code</button>
                    </div>
                    <div class="p-4">
                        <pre class="language-js text-white bg-gray-900 p-4 rounded-lg overflow-x-auto"><code id="jsCodeBlock2"><?php echo htmlspecialchars('
function init() {
    setupModeButtons();
    setupSquares();
    reset();
}

function setupModeButtons() {
    // ... event listeners for easyBtn and hardBtn go here ...
}

function setupSquares() {
    // ... event listeners for each square go here ...
}
                        '); ?></code></pre>
                    </div>
                </div>

                 <h3 class="text-2xl font-semibold text-white mb-3 mt-8">2c. Generating Random Colors</h3>
                 <p class="text-gray-300 mb-4">
                    This is the core logic for creating colors. The `randomColor` function generates a single "rgb(r, g, b)" string. The `generateRandomColors` function calls it multiple times (based on `numSquares`) to create an array of color strings for our game.
                </p>
                 <div class="bg-gray-800 rounded-xl shadow-2xl">
                     <div class="flex justify-between items-center p-4 bg-gray-900 rounded-t-xl border-b border-gray-700">
                        <h3 class="text-xl font-bold text-white">game.js (Part 3)</h3>
                        <button onclick="copyCode('jsCodeBlock3')" class="bg-teal-500 hover:bg-teal-600 text-white font-semibold px-4 py-2 rounded-lg transition-colors text-sm">Copy Code</button>
                    </div>
                    <div class="p-4">
                        <pre class="language-js text-white bg-gray-900 p-4 rounded-lg overflow-x-auto"><code id="jsCodeBlock3"><?php echo htmlspecialchars('
function generateRandomColors(num) {
    const arr = [];
    for (let i = 0; i < num; i++) {
        arr.push(randomColor());
    }
    return arr;
}

function randomColor() {
    // Pick a "red" from 0 - 255
    const r = Math.floor(Math.random() * 256);
    // Pick a "green" from 0 - 255
    const g = Math.floor(Math.random() * 256);
    // Pick a "blue" from 0 - 255
    const b = Math.floor(Math.random() * 256);
    return "rgb(" + r + ", " + g + ", " + b + ")";
}
                        '); ?></code></pre>
                    </div>
                </div>

                <h3 class="text-2xl font-semibold text-white mb-3 mt-8">2d. Resetting the Game</h3>
                <p class="text-gray-300 mb-4">
                    The `reset` function is what starts a new round. It generates new colors, picks one as the winner, updates the `colorDisplay` in the header, and then loops through the squares to assign them the new colors. It also handles showing/hiding squares for easy vs. hard mode.
                </p>
                <div class="bg-gray-800 rounded-xl shadow-2xl">
                    <div class="flex justify-between items-center p-4 bg-gray-900 rounded-t-xl border-b border-gray-700">
                        <h3 class="text-xl font-bold text-white">game.js (Part 4)</h3>
                        <button onclick="copyCode('jsCodeBlock4')" class="bg-teal-500 hover:bg-teal-600 text-white font-semibold px-4 py-2 rounded-lg transition-colors text-sm">Copy Code</button>
                    </div>
                    <div class="p-4">
                        <pre class="language-js text-white bg-gray-900 p-4 rounded-lg overflow-x-auto"><code id="jsCodeBlock4"><?php echo htmlspecialchars('
function reset() {
    colors = generateRandomColors(numSquares);
    pickedColor = pickColor();
    colorDisplay.textContent = pickedColor;
    messageDisplay.textContent = "";
    resetButton.textContent = "New Colors";
    gameHeader.style.backgroundColor = "#4fd1c5"; // Reset header color

    for (let i = 0; i < squares.length; i++) {
        if (colors[i]) {
            squares[i].style.display = "block"; // Show square if it has a color
            squares[i].style.backgroundColor = colors[i];
        } else {
            squares[i].style.display = "none"; // Hide extra squares in easy mode
        }
    }
}

// Helper function to pick a winning color from our `colors` array
function pickColor() {
    const random = Math.floor(Math.random() * colors.length);
    return colors[random];
}
                        '); ?></code></pre>
                    </div>
                </div>

                 <h3 class="text-2xl font-semibold text-white mb-3 mt-8">2e. Handling Clicks</h3>
                <p class="text-gray-300 mb-4">
                    Inside `setupSquares`, we add a `click` event listener to each square. When a square is clicked, we grab its `backgroundColor`. We then check if it matches the `pickedColor`. If it's a match, we call `changeColors()` to make everything the winning color. If not, we "fade" the incorrect square into the background color.
                </p>
                 <div class="bg-gray-800 rounded-xl shadow-2xl">
                    <div class="flex justify-between items-center p-4 bg-gray-900 rounded-t-xl border-b border-gray-700">
                        <h3 class="text-xl font-bold text-white">game.js (Part 5)</h3>
                        <button onclick="copyCode('jsCodeBlock5')" class="bg-teal-500 hover:bg-teal-600 text-white font-semibold px-4 py-2 rounded-lg transition-colors text-sm">Copy Code</button>
                    </div>
                    <div class="p-4">
                        <pre class="language-js text-white bg-gray-900 p-4 rounded-lg overflow-x-auto"><code id="jsCodeBlock5"><?php echo htmlspecialchars('
function setupSquares() {
    for (let i = 0; i < squares.length; i++) {
        squares[i].addEventListener("click", function() {
            const clickedColor = this.style.backgroundColor;
            if (clickedColor === pickedColor) {
                messageDisplay.textContent = "Correct!";
                resetButton.textContent = "Play Again?";
                changeColors(clickedColor);
                gameHeader.style.backgroundColor = clickedColor;
            } else {
                this.style.backgroundColor = "#2d3748"; // Fade to background
                messageDisplay.textContent = "Try Again";
            }
        });
    }
}

// Changes all squares to the correct color on win
function changeColors(color) {
    for (let i = 0; i < squares.length; i++) {
        squares[i].style.backgroundColor = color;
    }
}
                        '); ?></code></pre>
                    </div>
                </div>
            </section>
            
            <!-- Conclusion -->
            <section class="mt-16 text-center">
                 <h2 class="text-3xl font-bold text-teal-400 mb-4">Congratulations!</h2>
                 <p class="text-gray-300 leading-relaxed max-w-2xl mx-auto mb-8">
                    You've just walked through the entire process of building the RGB Color Game. You can see how combining a simple HTML structure with powerful JavaScript logic can create a really engaging user experience. Feel free to experiment with the code, change the number of squares, or add new features!
                 </p>
                 <a href="index.php?p=rgb_game_code" class="bg-gray-700 hover:bg-gray-600 text-white font-semibold px-8 py-3 rounded-lg transition-colors inline-block">View Full Source Code</a>
            </section>

        </article>
    </div>
</main>

<script>
    function copyCode(elementId) {
        const codeElement = document.getElementById(elementId);
        // We need to handle the decoded HTML entities
        const tempTextArea = document.createElement('textarea');
        tempTextArea.innerHTML = codeElement.innerHTML;
        const code = tempTextArea.value;
        
        tempTextArea.value = code.trim();
        document.body.appendChild(tempTextArea);
        tempTextArea.select();
        document.execCommand('copy');
        document.body.removeChild(tempTextArea);

        // Simple feedback alert
        alert('Code copied to clipboard!');
    }
</script>

