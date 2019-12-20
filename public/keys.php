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

    <p v-for="log in logs.slice().reverse()"> {{ log }}</p>
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
      logKeyAndFetch: function (key, old, qnew) {
        if (qnew !== old && qnew === true) {
          this.log.push(key);
          const url = 'http://ezhik.herokuapp.com/?key=' + key;
          fetch(url);
        }
      }
    },
    watch: {
      left: function (old, qnew) {
        alert(qnew);
        this.logKeyAndFetch('left', old, qnew)
      },
      right: function (old, qnew) {
        this.logKeyAndFetch('right', old, qnew)
      },
      up: function (old, qnew) {
        this.logKeyAndFetch('up', old, qnew)
      },
      down: function (old, qnew) {
        this.logKeyAndFetch('down', old, qnew)
      },
      btnx: function (old, qnew) {
        this.logKeyAndFetch('btnx', old, qnew)
      },
      btny: function (old, qnew) {
        this.logKeyAndFetch('btny', old, qnew)
      },
      btnb: function (old, qnew) {
        this.logKeyAndFetch('btnb', old, qnew)
      },
      btna: function (old, qnew) {
        this.logKeyAndFetch('btna', old, qnew)
      },
    }
  });

  setInterval(() => {
    const gamepads = navigator.getGamepads();
    if (gamepads) {
      const axes = gamepads[0].axes;
      const btn = gamepads[0].buttons;

      app.left = axes[0] <= -0.5;
      app.right = axes[0] >= 0.5;
      app.up = axes[1] <= -0.5;
      app.down = axes[1] >= 0.5;

      app.btnx = btn[2].pressed;
      app.btny = btn[3].pressed;
      app.btnb = btn[1].pressed;
      app.btna = btn[0].pressed;
    }
  }, 250)

</script>
</body>
</html>

