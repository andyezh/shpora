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

      left: false,
      right: false,
      up: false,
      down: false,
      btnx: false,
      btny: false,
      btnb: false,
      btna: false,
    },
    methods: {
      logKeyAndFetch: function (key, old, qnew) {
        if (qnew !== old && qnew === true) {
          alert('event');
          this.log.push(key);
          const url = 'http://ezhik.herokuapp.com/?key=' + key;
          fetch(url);
        }
      }
    },
    watch: {
      left: function (qnew, old) {
        this.logKeyAndFetch('left', old, qnew)
      },
      right: function (qnew, old) {
        this.logKeyAndFetch('right', old, qnew)
      },
      up: function (qnew, old) {
        this.logKeyAndFetch('up', old, qnew)
      },
      down: function (qnew, old) {
        this.logKeyAndFetch('down', old, qnew)
      },
      btnx: function (qnew, old) {
        this.logKeyAndFetch('btnx', old, qnew)
      },
      btny: function (qnew, old) {
        this.logKeyAndFetch('btny', old, qnew)
      },
      btnb: function (qnew, old) {
        this.logKeyAndFetch('btnb', old, qnew)
      },
      btna: function (qnew, old) {
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

