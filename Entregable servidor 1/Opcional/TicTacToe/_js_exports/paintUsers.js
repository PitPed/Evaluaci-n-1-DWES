async function getUser(id = null) {

    let response = await fetch('getUser.php' + id !== null ? '?UserID=' + id : '')
    user = await response.json()
    return user
}

async function paintUser(user = getUser()) {
    /*return `<div class='user_rectangle' id='host-user'>
        <img class='profile' src=${user['profilePic']}>
        <p class='username'>${user['username']}</p>
    </div>`*/
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