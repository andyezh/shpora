<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

    <title>Hello, world!</title>
</head>
<body>

<div class="container" id="app">
    <div class="row">
        <div class="col-md-12 m-3">
            <div
                    v-for="log in logs.slice().reverse()"
                    class="alert alert-primary"
            >
                {{ log }}
            </div>
        </div>
    </div>
</div>

</body>

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
          this.logs.push(key);
          const url = 'http://ezhik.herokuapp.com/request.php?key=' + key;
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
