<style>
    main {
        position: absolute;
        left: 5%;
        top: 5%;
        width: 90%;
        height: 90%;
        border-radius: 10px;
        border: 2px solid grey;
        background-color: lightgrey;
        display: grid;
        grid-template-columns: 50% 50%;
        align-items: center;
        text-align: center;
    }
</style>
<main>
    <div>
        <h1>Administra una sala!</h1>
        <button id="RoomCreator">Crear una Sala</button>
    </div>
    <div>
        <h1>Unirse a una sala</h1>
        <form action="joinRoom.php">
            <label>Introduce el número de sala</label><br>
            <input type="text" name="room" id="roomInput"><br>
            <input type="submit" value="Unirse">
        </form>
    </div>
</main>
<script>
    let gameCreatorButton = document.getElementById("RoomCreator")
    gameCreatorButton.onclick = async function () {
        await fetch('roomCreator.php')
        location.reload()
    }
</script>