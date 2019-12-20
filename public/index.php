<html>
<head>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://js.pusher.com/5.0/pusher.min.js"></script>
</head>
<body>

<div id="app">
    <div v-for="log in logs.slice().reverse()">{{ log }}</div>
</div>

<script>
  const app = new Vue({
    el: '#app',
    data: {
      logs: []
    }
  });

  const pusher = new Pusher('e11427fbe1304bcdb59a', {
    cluster: 'eu',
    forceTLS: true
  });

  const channel = pusher.subscribe('my-channel');
  channel.bind('my-event', function (data) {
    app.logs.push(data)
  });

</script>
</body>
</html>
