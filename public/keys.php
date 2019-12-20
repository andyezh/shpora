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


  function logKey(e) {
    log.textContent += e.gamepad;
    const url = 'http://localhost/?key=' + e.gamepad;
    fetch(url);
  }

  setInterval(() => {
    const gamepads = navigator.getGamepads();
    if (gamepads) {
      app.left = gamepads[0].axes[0];
      app.right = gamepads[0].axes[1];
      app.up = gamepads[0].axes[2];
      app.down = gamepads[0].axes[3];
    }
  }, 5000)

</script>
</body>
</html>

