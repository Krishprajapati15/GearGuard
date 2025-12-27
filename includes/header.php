<div id="header-container" style="width:100%;"></div>
<div id="header"></div>
<script>
    function loadHeader() {
      fetch("userhome/userheader")
        .then((response) => response.text())
        .then((data) => {
          const headerContainer = document.getElementById("header-container");
          headerContainer.insertAdjacentHTML("afterbegin", data);
          const scripts = headerContainer.querySelectorAll("script");
          scripts.forEach((script) => {
            const newScript = document.createElement("script");
            if (script.src) {
              newScript.src = script.src;
            } else {
              newScript.textContent = script.textContent;
            }
            document.body.appendChild(newScript);
          });
        })
        .catch((error) => console.error("Error loading header:", error));
    }
    loadHeader();
</script>