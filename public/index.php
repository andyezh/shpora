<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://js.pusher.com/5.0/pusher.min.js"></script>

    <title>Shpora Index</title>
</head>
<body>

<div class="container" id="app">
    <div class="row">
        <div class="col-md-12 m-3">
            <div :class="{'alert-danger': log.new}" v-for="log in logs.slice().reverse()" class="alert alert-primary">
                {{ log.data }} | {{ log.command }}
            </div>
        </div>
    </div>
</div>

</body>

<script>
  const app = new Vue({
    el: '#app',
    data: {
      logs: []
    },
    watch: {
      logs: function (logs) {
        const index = logs.length - 1;
        this.newLog(index);
      }
    },
    methods: {
      newLog(index) {
        setTimeout(() => {
          this.logs[index].new = false
        }, 5000)
      }
    }
  });

  const pusher = new Pusher('e11427fbe1304bcdb59a', {
    cluster: 'eu',
    forceTLS: true
  });

  const channel = pusher.subscribe('my-channel');
  channel.bind('my-event', function (data) {
    data.new = true;
    app.logs.push(data);
  });
</script>
</html>
