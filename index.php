<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Dream Analyzer</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <div class="container">
    <h1>🌙 Dream Analyzer</h1>
    <p>Welcome, <?= htmlspecialchars($_SESSION['username']) ?> | <a href="logout.php">Logout</a> | <a href="history.php">View History</a></p>
    <textarea id="dreamInput" placeholder="Describe your dream here..."></textarea>
    <button onclick="analyzeDream()">Analyze</button>
    <div id="resultContainer">
      <h2>Interpretation</h2>
      <ul id="results"></ul>
    </div>
  </div>
  <script>
    function analyzeDream() {
      const input = document.getElementById("dreamInput").value;
      fetch("analyze.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "dream=" + encodeURIComponent(input)
      })
      .then(res => res.json())
      .then(data => {
        const results = document.getElementById("results");
        results.innerHTML = "";
        if (data.length === 0) {
          results.innerHTML = "<li>No interpretations found.</li>";
        } else {
          data.forEach(item => {
            const li = document.createElement("li");
            li.textContent = item;
            results.appendChild(li);
          });
        }
      });
    }
  </script>
</body>
</html>
<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Dream Analyzer</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <div class="container">
    <h1>🌙 Dream Analyzer</h1>
    <p>Welcome, <?= htmlspecialchars($_SESSION['username']) ?> | <a href="logout.php">Logout</a> | <a href="history.php">View History</a></p>
    <textarea id="dreamInput" placeholder="Describe your dream here..."></textarea>
    <button onclick="analyzeDream()">Analyze</button>
    <div id="resultContainer">
      <h2>Interpretation</h2>
      <ul id="results"></ul>
    </div>
  </div>
  <script>
    function analyzeDream() {
      const input = document.getElementById("dreamInput").value;
      fetch("analyze.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "dream=" + encodeURIComponent(input)
      })
      .then(res => res.json())
      .then(data => {
        const results = document.getElementById("results");
        results.innerHTML = "";
        if (data.length === 0) {
          results.innerHTML = "<li>No interpretations found.</li>";
        } else {
          data.forEach(item => {
            const li = document.createElement("li");
            li.textContent = item;
            results.appendChild(li);
          });
        }
      });
    }
  </script>
</body>
</html>
