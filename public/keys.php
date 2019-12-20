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

    <div>btnx: {{btnx}}</div>
    <div>btny: {{btny}}</div>
    <div>btnb: {{btnb}}</div>
    <div>btna: {{btna}}</div>
</div>

<script>
  const app = new Vue({
    el: '#app',
    data: {
      logs: [],

      left: null,
      right: null,
      up: null,
      down: null,
      btnx: null,
      btny: null,
      btnb: null,
      btna: null,
    },
    methods: {
      logKeyAndFetch: function (key) {
        this.los.push(key);
        const url = 'http://ezhik.herokuapp.com/?key=' + key;
        fetch(url);
      }
    },
    watch: {
      left: function (oldLeft, newLeft) {
        this.logKeyAndFetch('left')
      },
      right: function () {
        this.logKeyAndFetch('right')
      },
      up: function () {
        this.logKeyAndFetch('up')
      },
      down: function () {
        this.logKeyAndFetch('down')
      },
      btnx: function () {
        this.logKeyAndFetch('btnx')
      },
      btny: function () {
        this.logKeyAndFetch('btny')
      },
      btnb: function () {
        this.logKeyAndFetch('btnb')
      },
      btna: function () {
        this.logKeyAndFetch('btna')
      },
    }
  });

  setInterval(() => {
    const gamepads = navigator.getGamepads();
    if (gamepads) {
      const axes = gamepads[0].axes;
      const btn = gamepads[0].buttons;

      app.left = axes[0] <= -0.5 ? 'true' : null;
      app.right = axes[0] >= 0.5 ? 'true' : null;
      app.up = axes[1] <= -0.5 ? 'true' : null;
      app.down = axes[1] >= 0.5 ? 'true' : null;

      app.btnx = btn[2].pressed === true ? 'true' : null;
      app.btny = btn[3].pressed === true ? 'true' : null;
      app.btnb = btn[1].pressed === true ? 'true' : null;
      app.btna = btn[0].pressed === true ? 'true' : null;
    }
  }, 250)

</script>
</body>
</html>

