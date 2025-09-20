<main class="flex-grow">
    <div class="container mx-auto px-6 py-12">
        <div class="mb-8">
            <a href="index.php?p=rgb_game" class="text-teal-400 hover:text-teal-300 transition-colors">&larr; Back to the Game</a>
        </div>

        <div class="max-w-4xl mx-auto">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">RGB Color Game: Source Code</h1>
            <p class="text-lg text-gray-400 mb-12">Here is the complete code used to build the RGB Color Game. It is written in plain HTML and JavaScript, styled with Tailwind CSS classes.</p>

            <!-- HTML/PHP Code Section -->
            <div class="bg-gray-800 rounded-xl shadow-2xl mb-8">
                <div class="flex justify-between items-center p-4 bg-gray-900 rounded-t-xl border-b border-gray-700">
                    <h2 class="text-2xl font-bold text-white">HTML Structure</h2>
                    <button onclick="copyCode('htmlCode')" class="bg-teal-500 hover:bg-teal-600 text-white font-semibold px-4 py-2 rounded-lg transition-colors text-sm">Copy Code</button>
                </div>
                <div class="p-6">
                    <pre class="language-html text-white bg-gray-900 p-4 rounded-lg overflow-x-auto"><code id="htmlCode"><?php echo htmlspecialchars('
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

            <!-- JavaScript Code Section -->
            <div class="bg-gray-800 rounded-xl shadow-2xl">
                 <div class="flex justify-between items-center p-4 bg-gray-900 rounded-t-xl border-b border-gray-700">
                    <h2 class="text-2xl font-bold text-white">JavaScript Logic</h2>
                    <button onclick="copyCode('jsCode')" class="bg-teal-500 hover:bg-teal-600 text-white font-semibold px-4 py-2 rounded-lg transition-colors text-sm">Copy Code</button>
                </div>
                <div class="p-6">
                    <pre class="language-js text-white bg-gray-900 p-4 rounded-lg overflow-x-auto"><code id="jsCode"><?php echo htmlspecialchars('
let numSquares = 9;
let colors = [];
let pickedColor;

const squares = document.querySelectorAll(".square");
const colorDisplay = document.getElementById("colorDisplay");
const messageDisplay = document.querySelector("#message");
const gameHeader = document.querySelector("#gameHeader");
const resetButton = document.querySelector("#reset");
const easyBtn = document.querySelector("#easyBtn");
const hardBtn = document.querySelector("#hardBtn");

init();

function init() {
    setupModeButtons();
    setupSquares();
    reset();
}

function setupModeButtons() {
    easyBtn.addEventListener("click", function() {
        hardBtn.classList.remove("bg-teal-500", "text-white");
        hardBtn.classList.add("text-teal-400");
        easyBtn.classList.add("bg-teal-500", "text-white");
        easyBtn.classList.remove("text-teal-400");
        numSquares = 6;
        reset();
    });

    hardBtn.addEventListener("click", function() {
        easyBtn.classList.remove("bg-teal-500", "text-white");
        easyBtn.classList.add("text-teal-400");
        hardBtn.classList.add("bg-teal-500", "text-white");
        hardBtn.classList.remove("text-teal-400");
        numSquares = 9;
        reset();
    });

    resetButton.addEventListener("click", function() {
        reset();
    });
}

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
                this.style.backgroundColor = "#2d3748";
                messageDisplay.textContent = "Try Again";
            }
        });
    }
}

function reset() {
    colors = generateRandomColors(numSquares);
    pickedColor = pickColor();
    colorDisplay.textContent = pickedColor;
    resetButton.textContent = "New Colors";
    messageDisplay.textContent = "";

    for (let i = 0; i < squares.length; i++) {
        if (colors[i]) {
            squares[i].style.display = "block";
            squares[i].style.backgroundColor = colors[i];
        } else {
            squares[i].style.display = "none";
        }
    }
    gameHeader.style.backgroundColor = "#4fd1c5";
}

function changeColors(color) {
    for (let i = 0; i < squares.length; i++) {
        squares[i].style.backgroundColor = color;
    }
}

function pickColor() {
    const random = Math.floor(Math.random() * colors.length);
    return colors[random];
}

function generateRandomColors(num) {
    const arr = [];
    for (let i = 0; i < num; i++) {
        arr.push(randomColor());
    }
    return arr;
}

function randomColor() {
    const r = Math.floor(Math.random() * 256);
    const g = Math.floor(Math.random() * 256);
    const b = Math.floor(Math.random() * 256);
    return "rgb(" + r + ", " + g + ", " + b + ")";
}
                    '); ?></code></pre>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    function copyCode(elementId) {
        const codeElement = document.getElementById(elementId);
        const code = codeElement.innerText;
        
        const tempTextArea = document.createElement('textarea');
        tempTextArea.value = code;
        document.body.appendChild(tempTextArea);
        tempTextArea.select();
        document.execCommand('copy');
        document.body.removeChild(tempTextArea);

        alert('Code copied to clipboard!');
    }
</script>
