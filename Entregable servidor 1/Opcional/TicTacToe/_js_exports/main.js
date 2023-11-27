async function getUser(id) {
    let response = await fetch('getUser.php?UserID=' + id)
    user = await response.json()
    return user
}

async function paintUser(user) {


    let userRectangle = document.createElement('div')
    userRectangle.classList = 'user_rectangle'
    userRectangle.id = 'host-user'

    let profileImg = document.createElement('img')
    profileImg.classList = 'profile'
    profileImg.src = user['profilePic']

    let username = document.createElement('p')
    username.classList = 'username'
    username.innerHTML = user['username']

    userRectangle.appendChild(profileImg)
    userRectangle.appendChild(username)

    return userRectangle
}

async function paintPlayer(host = null, id = null) {
    let response
    if (host !== null)
        response = await fetch('getUser.php?FromRoom=' + (+host))
    else
        response = await fetch('getUser.php?UserID=' + id)
    let user = await response.json()
    let userRectangle = await paintUser(user)
    userRectangle.classList += " " + (host ? 'host' : 'guest')
    document.body.appendChild(userRectangle)
    return userRectangle
}

async function paintEnd(winner) {
    let endRectangle = document.createElement('div')
    endRectangle.id = 'endRectangle'

    let textHeader = document.createElement('h1')
    textHeader.innerHTML = 'La partida ha terminado'
    endRectangle.appendChild(textHeader)

    let textWinner = document.createElement('h2')
    if (winner !== true)
        textWinner.innerHTML = 'Ha ganado:'
    else
        textWinner.innerHTML = 'La partida ha terminado en empate'
    endRectangle.appendChild(textWinner)

    if (winner !== true) {
        let winnerRectangle = await paintPlayer(null, winner)
        endRectangle.appendChild(winnerRectangle)
    } /*else {
        let user1Rectangle = await paintPlayer(host = true)
        endRectangle.appendChild(user1Rectangle)
        let user2Rectangle = await paintPlayer(host = false)
        endRectangle.appendChild(user2Rectangle)
    }*/

    let returnButton = document.createElement('button')
    returnButton.innerHTML = 'Go to Game'
    returnButton.onclick = function () { document.getElementById('endRectangle').style = "display: none" }
    returnButton.classList = "returnButton"
    endRectangle.appendChild(returnButton)

    let roomButton = document.createElement('button')
    roomButton.innerHTML = 'Go to Room'
    roomButton.classList = "roomButton"
    endRectangle.appendChild(roomButton)

    return endRectangle
}


let tablero = document.getElementById("board")
let game

function setButtons() {
    let buttons = Array.from(tablero.children)
    let botones = []
    botones[0] = buttons.slice(0, 3)
    botones[1] = buttons.slice(3, 6)
    botones[2] = buttons.slice(6, 10)
    return botones
}


for (let i = 0; i < 9; i++) {
    let boton = document.createElement("button")
    boton.onclick = function () { play(i) }
    tablero.appendChild(boton)
}



async function getGame() {
    let response = await fetch('getGame.php')
    game = await response.json()
    return game
}

async function paintBoard() {
    await getGame()
    let board = game['board']
    for (row in board) {
        for (column in board[row]) {
            let button = botones[row][column]
            if (board[row][column] != 0) {
                button.innerHTML = board[row][column] == 1 ? "X" : "O"
                button.disabled = 'true'
            }
        }
    }
    if (game['winner'] !== false) {
        //document.body.appendChild(paintEnd(game['winner']))
        clearInterval(paintingInterval)
    }
}


async function play(x) {
    await fetch('./playTurn.php?move=' + x)
    await paintBoard()
}


let botones = setButtons()
let paintingInterval = setInterval(paintBoard, 1000)
//let winnerP = document.getElementById('winnerP')



paintPlayer(host = true)
paintPlayer(host = false)