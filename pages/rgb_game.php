<main class="flex-grow">
    <div class="container mx-auto px-6 py-12">
        <div class="mb-8">
            <a href="index.php?p=projects" class="text-teal-400 hover:text-teal-300 transition-colors">&larr; Back to Projects</a>
        </div>

        <!-- Game Container -->
        <div class="max-w-3xl mx-auto bg-gray-800 rounded-xl shadow-2xl">
            <!-- Header -->
            <div id="gameHeader" class="bg-teal-500 text-white text-center py-6 px-4 rounded-t-xl transition-colors duration-500">
                <h1 class="text-2xl md:text-4xl font-bold uppercase tracking-wider">The Great
                    <br>
                    <span id="colorDisplay" class="text-4xl md:text-6xl font-black">RGB</span>
                    <br>
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

        <!-- How to Play & Code Section -->
        <div class="max-w-3xl mx-auto bg-gray-800 rounded-xl shadow-2xl mt-12 p-8">
            <h2 class="text-3xl font-bold text-white mb-4">How to Play</h2>
            <p class="text-gray-400 mb-6">The goal is simple: guess which color square matches the RGB value shown in the header.
                <ul class="list-disc list-inside text-gray-400 space-y-2">
                    <li>The RGB color value (e.g., rgb(255, 0, 0)) is displayed at the top.</li>
                    <li>Click on the colored square that you think matches the RGB value.</li>
                    <li>If you're correct, all squares will change to the winning color.</li>
                    <li>If you're wrong, the square you clicked will disappear.</li>
                    <li>Use the "Easy" and "Hard" buttons to change the difficulty.</li>
                </ul>
            </p>
            <h2 class="text-3xl font-bold text-white mb-4 mt-8">Learn to Build It</h2>
            <p class="text-gray-400 mb-6">Ready to peek behind the curtain? You can view the complete source code for this game, or follow our detailed lesson to build it step-by-step.</p>
            <div class="flex flex-col md:flex-row gap-4">
                <a href="index.php?p=rgb_game_code" class="flex-1 text-center bg-gray-700 hover:bg-gray-600 text-white font-semibold px-6 py-3 rounded-lg transition-colors">
                    View Full Code
                </a>
                <a href="#" class="flex-1 text-center bg-teal-500 hover:bg-teal-600 text-white font-semibold px-6 py-3 rounded-lg transition-colors">
                    Start Interactive Lesson
                </a>
            </div>
        </div>

    </div>
</main>

<script>
    // --- START OF GAME LOGIC ---
    let numSquares = 9;
    let colors = [];
    let pickedColor;

    // --- Selectors ---
    const squares = document.querySelectorAll(".square");
    const colorDisplay = document.getElementById("colorDisplay");
    const messageDisplay = document.querySelector("#message");
    const gameHeader = document.querySelector("#gameHeader");
    const resetButton = document.querySelector("#reset");
    const easyBtn = document.querySelector("#easyBtn");
    const hardBtn = document.querySelector("#hardBtn");

    // --- Initializer ---
    init();

    function init() {
        setupModeButtons();
        setupSquares();
        reset();
    }

    // --- Event Listeners Setup ---
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
            //add click listeners to squares
            squares[i].addEventListener("click", function() {
                //grab color of clicked squares
                const clickedColor = this.style.backgroundColor;
                //compare color to pickedColor
                if (clickedColor === pickedColor) {
                    messageDisplay.textContent = "Correct!";
                    resetButton.textContent = "Play Again?";
                    changeColors(clickedColor);
                    gameHeader.style.backgroundColor = clickedColor;
                } else {
                    this.style.backgroundColor = "#2d3748"; // tailwind gray-800
                    messageDisplay.textContent = "Try Again";
                }
            });
        }
    }

    // --- Core Functions ---
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
        gameHeader.style.backgroundColor = "#4fd1c5"; // tailwind teal-400
    }

    function changeColors(color) {
        //loop through all squares
        for (let i = 0; i < squares.length; i++) {
            //change each color to match given color
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
    // --- END OF GAME LOGIC ---
</script>

