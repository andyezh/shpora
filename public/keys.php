<html>
<head>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
</head>
<body>

<div id="app">
    <div>left: {{left}}</div>
    <div>right: {{right}}</div>
    <div>up: {{up}}</div>
    <div>down: {{down}}</div>
</div>

<script>
  const app = new Vue({
    el: '#app',
    data: {
      logs: [],
      left: null,
      right: null,
      up: null,
      down: null
    }
  });


  function scangamepad() {
    const gamepads = navigator.getGamepads();
    if (gamepads) {
      app.left = gamepad[0].axes;
      app.right = gamepad[0].axes[1];
      app.up = gamepad[0].axes[2];
      app.down = gamepad[0].axes[3];
    }
  }

  function logKey(e) {
    log.textContent += e.gamepad;
    const url = 'http://localhost/?key=' + e.gamepad;
    fetch(url);
  }

  setInterval(scangamepad, 5000)

</script>
</body>
</html>

