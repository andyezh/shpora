<html>
<body>
<div id="log"></div>

<script>
  function scangamepad() {
    const gamepad = navigator.getGamepads();
    alert(gamepad[0])
  }

  function logKey(e) {
    log.textContent += e.gamepad;
    const url = 'http://localhost/?key=' + e.gamepad;
    fetch(url);
  }

  window.addEventListener("gamepadconnected", (event) => {
    alert("A gamepad connected:");
  });

  window.addEventListener("gamepaddisconnected", (event) => {
    alert("A gamepad disconnected:");
  });

  setInterval(scangamepad, 5000)
</script>
</body>
</html>
