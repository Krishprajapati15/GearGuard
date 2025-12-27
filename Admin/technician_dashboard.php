<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TechFlow | Workspace</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap");

      :root {
        --bg: #f8f6f4;
        --mint-soft: #d2e9e9;
        --mint-bold: #a5d0d0;
        --card-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05);
      }

      body {
        background-color: var(--bg);
        font-family: "Plus Jakarta Sans", sans-serif;
        margin: 0;
        padding: 0;
      }

      /* --- Amazing Header Styling --- */
      .main-header {
        background: rgba(255, 255, 255, 0.8);
        backdrop-filter: blur(12px);
        border-bottom: 1px solid var(--mint-soft);
        position: sticky;
        top: 0;
        z-index: 100;
      }

      .kanban-col {
        background: rgba(210, 233, 233, 0.3);
        border-radius: 24px;
        padding: 1.5rem;
        min-height: 75vh;
        border: 1px solid rgba(165, 208, 208, 0.2);
      }

      .task-card {
        background: white;
        border-radius: 20px;
        padding: 1.25rem;
        box-shadow: var(--card-shadow);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: 1px solid transparent;
        cursor: default;
      }

      .task-card:hover {
        transform: translateY(-5px);
        border-color: var(--mint-bold);
        box-shadow: 0 20px 30px -10px rgba(165, 208, 208, 0.4);
      }

      .priority-high {
        border-top: 6px solid #ff4d4d;
      }
      .priority-med {
        border-top: 6px solid #ffa500;
      }
      .priority-low {
        border-top: 6px solid #a5d0d0;
      }

      .btn-claim {
        background: linear-gradient(135deg, #a5d0d0 0%, #83b7b7 100%);
        box-shadow: 0 4px 15px rgba(165, 208, 208, 0.3);
      }

      .btn-calendar {
        background-color: #000;
        color: #fff;
        transition: all 0.3s ease;
      }

      .btn-calendar:hover {
        background-color: #333;
        transform: translateY(-2px);
      }

      .dragging {
        opacity: 0.5;
        transform: scale(0.95);
      }
    </style>
  </head>
  <body>
    <header class="main-header px-8 py-4">
      <div class="max-w-[1600px] mx-auto flex justify-between items-center">
        <div class="flex items-center space-x-3">
          <div class="h-10 rounded-xl flex items-center justify-center">
            <img
              src="../logo2.png"
              alt="Logo"
              class="h-10 w-auto"
              onerror="this.innerHTML='GG'; this.style.color='white';"
            />
          </div>
          <div>
            <img
              src="../logo1.png"
              alt="Logo"
              class="h-10 w-auto"
              onerror="this.innerHTML='GG'; this.style.color='white';"
            />
          </div>
        </div>

        <div class="flex items-center space-x-6">
          <button onclick="window.location.href='technician_dashboard.php'"
                    class="btn-calendar flex items-center px-5 py-2.5 rounded-xl font-bold text-sm shadow-xl text-black bg-blue-200 hover:bg-blue-400"> Dashboard
                </button>
          <button
            onclick="window.location.href='tech_calendar.php'"
            class="btn-calendar flex items-center px-5 py-2.5 rounded-xl font-bold text-sm shadow-xl"
          >
            <i class="fa fa-calendar-alt mr-2 text-[#A5D0D0]"></i> View Calendar
          </button>

          <div class="flex items-center pl-6 border-l border-gray-100">
            <div class="text-right mr-3 hidden sm:block">
              <p class="text-sm font-black text-gray-800">Aryan Patel</p>
              <p class="text-[9px] font-bold text-gray-400">MECHANIC TEAM</p>
            </div>
            <div
              class="w-11 h-11 rounded-2xl bg-[#D2E9E9] flex items-center justify-center text-[#83B7B7] font-black text-lg border-2 border-white shadow-sm"
            >
              AP
            </div>
          </div>
        </div>
      </div>
    </header>

    <main class="p-8 lg:p-12 max-w-[1700px] mx-auto">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
        <div class="kanban-col" id="col-available">
          <div class="flex justify-between items-center mb-6 px-2">
            <h3
              class="font-extrabold text-gray-400 text-xs uppercase tracking-widest"
            >
              Open Pool
            </h3>
            <span
              class="bg-white text-gray-800 text-[10px] font-bold px-2 py-1 rounded-full shadow-sm"
              >2</span
            >
          </div>

          <div id="available-container" class="space-y-6">
            <div class="task-card priority-high" id="task-101">
              <div class="flex justify-between items-start mb-4">
                <span
                  class="px-2 py-1 bg-red-50 text-red-500 text-[9px] font-black rounded-lg"
                  >#REQ-101</span
                >
                <i class="fa fa-bolt text-red-200"></i>
              </div>
              <h4 class="font-bold text-gray-800 mb-1">Engine Hydrolock</h4>
              <p class="text-[11px] text-gray-500 mb-5 leading-relaxed">
                Excavator B-4 is non-responsive. Possible water in cylinders.
              </p>
              <button
                onclick="claimTask('task-101')"
                class="btn-claim w-full py-3 text-white text-xs font-black rounded-xl transition-all active:scale-95"
              >
                CLAIM TASK
              </button>
            </div>

            <div class="task-card priority-low" id="task-102">
              <div class="flex justify-between items-start mb-4">
                <span
                  class="px-2 py-1 bg-[#f0f9f9] text-[#4a7a7a] text-[9px] font-black rounded-lg"
                  >#REQ-102</span
                >
                <i class="fa fa-info-circle text-[#A5D0D0]"></i>
              </div>
              <h4 class="font-bold text-gray-800 mb-1">Routine Lube</h4>
              <p class="text-[11px] text-gray-500 mb-5 leading-relaxed">
                Scheduled quarterly lubrication for Conveyor Line 2.
              </p>
              <button
                onclick="claimTask('task-102')"
                class="btn-claim w-full py-3 text-white text-xs font-black rounded-xl transition-all active:scale-95"
              >
                CLAIM TASK
              </button>
            </div>
          </div>
        </div>

        <div
          class="kanban-col"
          ondrop="drop(event)"
          ondragover="allowDrop(event)"
          id="In-Progress"
        >
          <div class="flex justify-between items-center mb-6 px-2">
            <h3
              class="font-extrabold text-[#83B7B7] text-xs uppercase tracking-widest"
            >
              Active Repair
            </h3>
          </div>
          <div id="progress-container" class="space-y-6 min-h-[100px]"></div>
        </div>

        <div
          class="kanban-col"
          ondrop="drop(event)"
          ondragover="allowDrop(event)"
          id="Repaired"
        >
          <div class="flex justify-between items-center mb-6 px-2">
            <h3
              class="font-extrabold text-green-500 text-xs uppercase tracking-widest"
            >
              Finished
            </h3>
          </div>
          <div id="repaired-container" class="space-y-6 min-h-[100px]"></div>
        </div>

        <div
          class="kanban-col bg-red-50/50"
          ondrop="drop(event)"
          ondragover="allowDrop(event)"
          id="Scrap"
        >
          <div class="flex justify-between items-center mb-6 px-2">
            <h3
              class="font-extrabold text-red-400 text-xs uppercase tracking-widest"
            >
              Decommission
            </h3>
          </div>
          <div id="scrap-container" class="space-y-6 min-h-[100px]"></div>
        </div>
      </div>
    </main>

    <div
      id="logModal"
      class="fixed inset-0 bg-black/40 backdrop-blur-md hidden items-center justify-center p-4 z-[200]"
    >
      <div class="bg-white rounded-[32px] p-10 w-full max-w-sm shadow-2xl">
        <h2 class="text-2xl font-black text-gray-900 mb-2">Finalize Work</h2>
        <p class="text-gray-400 text-sm mb-8">
          Please log the actual hours spent to update the admin stats.
        </p>
        <input
          type="number"
          id="log-hours"
          placeholder="Total Hours (e.g. 1.5)"
          class="w-full p-4 bg-gray-50 rounded-2xl border-none focus:ring-2 focus:ring-[#A5D0D0] outline-none mb-8 font-bold"
        />
        <button
          onclick="finalizeWork()"
          class="w-full py-4 bg-black text-white rounded-2xl font-black text-sm tracking-widest"
        >
          SUBMIT REPORT
        </button>
      </div>
    </div>

    <script>
      let currentMovingTask = null;

      function claimTask(taskId) {
        const task = document.getElementById(taskId);
        const progressCol = document.getElementById("progress-container");

        task.querySelector("button").remove();
        task.setAttribute("draggable", "true");
        task.classList.add("cursor-grab");
        task.addEventListener("dragstart", (e) => {
          currentMovingTask = task;
          task.classList.add("dragging");
        });
        task.addEventListener("dragend", () =>
          task.classList.remove("dragging")
        );

        const badge = document.createElement("div");
        badge.className = "mt-5 pt-4 border-t flex items-center";
        badge.innerHTML = `<div class="w-5 h-5 rounded-full bg-blue-500 text-[8px] text-white flex items-center justify-center font-black">AP</div>
                               <span class="ml-2 text-[10px] font-bold text-gray-400 italic">Work in progress</span>`;
        task.appendChild(badge);

        progressCol.appendChild(task);
      }

      function allowDrop(ev) {
        ev.preventDefault();
      }

      function drop(ev) {
        ev.preventDefault();
        const col = ev.target.closest(".kanban-col");
        if (!col || !currentMovingTask) return;

        if (col.id === "Repaired") {
          document.getElementById("logModal").style.display = "flex";
        } else {
          col.querySelector(".space-y-6").appendChild(currentMovingTask);
        }
      }

      function finalizeWork() {
        const hours = document.getElementById("log-hours").value;
        if (!hours) return alert("Please log hours.");
        document
          .getElementById("repaired-container")
          .appendChild(currentMovingTask);
        document.getElementById("logModal").style.display = "none";
      }
    </script>
  </body>
</html>
