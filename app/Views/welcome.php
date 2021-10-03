<?= $this->extend('master') ?>

<?= $this->section('content') ?>
    <div class="row my-auto" style="height: 100vh">
        <div class="col-sm-12 col-md-3 col-lg-4 col-xl-4 col-xxl-4"></div>
        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4 d-flex align-items-center" style="height: 100vh">
            <div class="card w-100">
                <div class="card-body">
                    <h4 class="text-center bg-light p-2 mb-3">Tic-Tac-Toe Game</h4>
                    <div class="row">
                        <div class="col-4 border"><button id="1" onclick="selectHole(1)" class="btn w-100 h-100 btn-danger py-4"></button></div>
                        <div class="col-4 border"><button id="2" onclick="selectHole(2)" class="btn w-100 h-100 btn-danger py-4"></button></div>
                        <div class="col-4 border"><button id="3" onclick="selectHole(3)" class="btn w-100 h-100 btn-danger py-4"></button></div>
                        <div class="col-4 border"><button id="4" onclick="selectHole(4)" class="btn w-100 h-100 btn-danger py-4"></button></div>
                        <div class="col-4 border"><button id="5" onclick="selectHole(5)" class="btn w-100 h-100 btn-danger py-4"></button></div>
                        <div class="col-4 border"><button id="6" onclick="selectHole(6)" class="btn w-100 h-100 btn-danger py-4"></button></div>
                        <div class="col-4 border"><button id="7" onclick="selectHole(7)" class="btn w-100 h-100 btn-danger py-4"></button></div>
                        <div class="col-4 border"><button id="8" onclick="selectHole(8)" class="btn w-100 h-100 btn-danger py-4"></button></div>
                        <div class="col-4 border"><button id="9" onclick="selectHole(9)" class="btn w-100 h-100 btn-danger py-4"></button></div>
                    </div>
                    <div id="feedback" class="mt-3"></div>
                    <div id="buttonContainer" class="text-center"></div>
                </div>
            </div>
        </div>
        
        <div class="col-sm-12 col-md-3 col-lg-4 col-xl-4 col-xxl-4 my-auto">
            <span class="lead">First Player: <?php echo $players['first_player_name']; ?></span>
            <br>
            <span class="lead">Second Player: <?php echo  $players['second_player_name']; ?></span>
        </div>
    </div>
    
    <script>
        const playerOne = "<?php echo $players['first_player_name']; ?>"
        const playerTwo = "<?php echo $players['second_player_name']; ?>"

        const hole1 = document.getElementById("1");
        const hole2 = document.getElementById("2");
        const hole3 = document.getElementById("3");
        const hole4 = document.getElementById("4");
        const hole5 = document.getElementById("5");
        const hole6 = document.getElementById("6");
        const hole7 = document.getElementById("7");
        const hole8 = document.getElementById("8");
        const hole9 = document.getElementById("9");
        const feedback = document.getElementById("feedback");
        const buttonContainer = document.getElementById("buttonContainer");
        let matchFinished = false;
        let playerOneChoice;
        let recentChoice;
        let winner;
        let clickCount = 1;
        let turn = 1;

        const selectHole = (a) => {
            // console.log(clickCount >= 9);

            // if(clickCount === 9){
            //     checkWinner();
            // } else {
                if(document.getElementById(`${a}`).innerHTML != ""){
                    return;
                } else {
                    if(recentChoice === "O"){
                        document.getElementById(`${a}`).innerHTML = "X";
                        recentChoice = "X";
                    } else {
                        document.getElementById(`${a}`).innerHTML = "O";
                        recentChoice = "O";
                    }
                    
                    clickCount++;
                }
                checkMatchFinished();
                if(clickCount >= 6){
                    checkWinner();
                }
                if(clickCount >= 8){
                    checkDraw();
                }
            // }
        }

        const checkWinner = () => {
            if(hole1.innerHTML === hole2.innerHTML && hole2.innerHTML == hole3.innerHTML && hole1.innerHTML !== "" && hole2.innerHTML !== "" && hole3.innerHTML !== ""){
                winner = hole1.innerHTML;
                displayWinner();
            } else if (hole1.innerHTML === hole4.innerHTML && hole4.innerHTML == hole7.innerHTML && hole1.innerHTML !== "" && hole4.innerHTML !== "" && hole7.innerHTML !== ""){
                winner = hole1.innerHTML;
                displayWinner();
            } else if (hole1.innerHTML === hole5.innerHTML && hole5.innerHTML == hole9.innerHTML && hole1.innerHTML !== "" && hole5.innerHTML !== "" && hole9.innerHTML !== ""){
                winner = hole1.innerHTML;
                displayWinner();
            } else if (hole2.innerHTML === hole5.innerHTML && hole5.innerHTML == hole8.innerHTML && hole2.innerHTML !== "" && hole5.innerHTML !== "" && hole8.innerHTML !== ""){
                winner = hole2.innerHTML;
                displayWinner();
            } else if (hole3.innerHTML === hole5.innerHTML && hole5.innerHTML == hole7.innerHTML && hole3.innerHTML !== "" && hole5.innerHTML !== "" && hole7.innerHTML !== ""){
                winner = hole3.innerHTML;
                displayWinner();
            } else if (hole3.innerHTML === hole6.innerHTML && hole6.innerHTML == hole9.innerHTML && hole3.innerHTML !== "" && hole6.innerHTML !== "" && hole9.innerHTML !== ""){
                winner = hole3.innerHTML;
                displayWinner();
            } else if (hole4.innerHTML === hole5.innerHTML && hole5.innerHTML == hole6.innerHTML && hole4.innerHTML !== "" && hole5.innerHTML !== "" && hole6.innerHTML !== ""){
                winner = hole4.innerHTML;
                displayWinner();
            } else if (hole7.innerHTML === hole8.innerHTML && hole8.innerHTML == hole9.innerHTML && hole7.innerHTML !== "" && hole8.innerHTML !== "" && hole9.innerHTML !== ""){
                winner = hole7.innerHTML;
                displayWinner();
            }
        }

        const displayWinner = () => {
            matchFinished = true;
            feedback.innerHTML = `<div class="alert alert-success text-center"><span class="fw-bold">Player ${winner === "O" ? playerOne : playerTwo }</span> wins!</div>`
            sendResult();
        }
        const displayDraw = () => {
            feedback.innerHTML = `<div class="alert alert-warning text-center">DRAW!</div>`
        }
        const checkMatchFinished = () => {
            if(matchFinished === true){
                restartGame();
            }
        }
        const restartGame = () => {
            hole1.innerHTML = "";
            hole2.innerHTML = "";
            hole3.innerHTML = "";
            hole4.innerHTML = "";
            hole5.innerHTML = "";
            hole6.innerHTML = "";
            hole7.innerHTML = "";
            hole8.innerHTML = "";
            hole9.innerHTML = "";
            feedback.innerHTML = "";
        }

    var csrfName = '<?= csrf_token() ?>';
    var csrfHash = '<?= csrf_hash() ?>'; 
    let requestData = JSON.stringify({
        first_player_name: playerOne,
        second_player_name:playerTwo,
        winner: winner === "O" ? playerOne : playerTwo ,
    });

function sendResult() {
    fetch("store-game-data", {
        method: "POST",
        body: requestData,
        headers: {
            "Content-Type": "application/json",
            "X-Requested-With": "XMLHttpRequest"
        }
    })
        .then(response => {
            console.log(response)
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            // window.location.href = "/";
        })
        .catch(error => {
            console.error(
                "Error while sending result.",
                error
            );
            console.log(error);
        });
}

    </script>
<?= $this->endSection() ?>