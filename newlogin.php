<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ระบบลงชื่อเข้าใช้</title>
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- LINE LIFF SDK -->
  <script src="https://static.line-scdn.net/liff/edge/2/sdk.js"></script>

  <style>
    body {
      background: #f7f7f7;
    }
    .card {
      max-width: 400px;
      border-radius: 15px;
    }
    .role-btn {
      font-size: 18px;
      padding: 12px;
      border-radius: 10px;
      transition: 0.2s;
    }
    .role-btn:hover {
      transform: scale(1.05);
    }
  </style>
</head>
<body class="d-flex justify-content-center align-items-center vh-100">

  <div class="card shadow-lg text-center p-4">
    <h4 class="mb-3">ระบบลงชื่อเข้าใช้</h4>
    <p class="text-muted">กรุณาเลือกบทบาทของคุณเพื่อดำเนินการต่อ</p>

    <div class="d-grid gap-3">
      <button class="btn btn-outline-primary role-btn" onclick="selectRole('ผู้ใช้')">
        👤 ผู้ใช้
      </button>
      <button class="btn btn-outline-success role-btn" onclick="selectRole('แอดมิน')">
        🛠️ แอดมิน
      </button>
      <button class="btn btn-outline-danger role-btn" onclick="selectRole('ซินแส')">
        🧙 ซินแส
      </button>
    </div>
  </div>

  <script>
    // เริ่มต้น LIFF (ใช้ LIFF ID จาก LINE Developers)
    document.addEventListener("DOMContentLoaded", function() {
      liff.init({ liffId: "2007803528-M28zJBk3" })
        .then(() => {
          if (!liff.isLoggedIn()) {
            liff.login();
          }
        })
        .catch(err => console.error("LIFF init error", err));
    });

    function selectRole(role) {
      if (liff.isLoggedIn()) {
        liff.getProfile().then(profile => {
          alert("คุณเข้าสู่ระบบเป็น: " + role + "\nชื่อ: " + profile.displayName);
          // ตรงนี้สามารถ redirect ไปหน้าที่เกี่ยวข้องได้ เช่น:
          // if(role === "ผู้ใช้") window.location.href = "user.html";
          // if(role === "แอดมิน") window.location.href = "admin.html";
          // if(role === "ซินแส") window.location.href = "master.html";
        });
      } else {
        liff.login();
      }
    }
  </script>
</body>
</html>
