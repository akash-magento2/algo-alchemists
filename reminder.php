<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dynamic Goal List</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    /* Style to customize the toggle button */
    .form-switch .form-check-input:checked {
      background-color: #0d6efd; /* Blue color for 'on' state */
    }
    .btn-success{
        float: right;
    }
  </style>
</head>
<body>

<div class="container mt-5">
  <h2>Goal List</h2>
  <table class="table">
    <thead>
      <tr>
        <th>Goal</th>
        <th>Status</th>
        <th>Frequency</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody id="goalList">
      <!-- Dynamic Goal Rows will be added here -->
    </tbody>
  </table>
  <button class="btn btn-primary" id="addGoalBtn">+ Add Goal</button>
</div>

<!-- Modal for Frequency Picker -->
<div class="modal fade" id="frequencyModal" tabindex="-1" aria-labelledby="frequencyModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="frequencyModalLabel">Choose Frequency</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="frequencyForm">
          <div class="mb-3">
            <label for="frequencySelect" class="form-label">Select Frequency</label>
            <select class="form-select" id="frequencySelect">
              <option value="2hr">2 hr</option>
              <option value="3hr">3 hr</option>
              <option value="calendar">Pick Date</option>
            </select>
          </div>
          <div class="mb-3" id="calendarPicker" style="display:none;">
            <label for="calendarInput" class="form-label">Pick Date</label>
            <input type="date" class="form-control" id="calendarInput">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="setFrequencyBtn">Set Frequency</button>
      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const addGoalBtn = document.getElementById('addGoalBtn');
    const goalList = document.getElementById('goalList');
    const frequencyModal = new bootstrap.Modal(document.getElementById('frequencyModal'));
    let goalCount = 0;

    // Fetch existing goals from the server (database)
    fetch('fetch_goals.php', {
      method: 'GET',
    })
    .then(response => response.json())
    .then(data => {
      if (data.status === 'success' && data.goals) {
        // Populate the goals table with the existing data
        data.goals.forEach((goal, index) => {
          goalCount++;
          const goalRow = document.createElement('tr');
          goalRow.id = 'goalRow' + goalCount;

          goalRow.innerHTML = `
            <td><input type="text" class="form-control" placeholder="Enter goal name" id="goalName${goalCount}" value="${goal.goal_name}"></td>
            <td>
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="status${goalCount}" ${goal.status == 1 ? 'checked' : ''}>
                <label class="form-check-label" for="status${goalCount}">${goal.status == 1 ? 'On' : 'Off'}</label>
              </div>
            </td>
            <td>
              <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#frequencyModal" id="setFrequency${goalCount}">Set Frequency</button>
              <span id="frequencyDisplay${goalCount}">${goal.frequency}</span>
            </td>
            <td><button class="btn btn-danger btn-sm" onclick="removeGoal(${goalCount})">Remove</button></td>
          `;
          goalList.appendChild(goalRow);

          // Set the frequency when the goal is loaded
          document.getElementById('frequencyDisplay' + goalCount).innerText = goal.frequency;

          // Toggle Status Text (On/Off) when clicked
          const statusToggle = document.getElementById('status' + goalCount);
          const statusLabel = statusToggle.nextElementSibling; // Access label for status
          statusToggle.addEventListener('change', function () {
            if (statusToggle.checked) {
              statusLabel.textContent = 'On';
            } else {
              statusLabel.textContent = 'Off';
            }
          });
        });
      }
    })
    .catch(error => console.error('Error:', error));

    // Add Goal Button Click
    addGoalBtn.addEventListener('click', function () {
      goalCount++;

      // Create a new goal row with fields
      const goalRow = document.createElement('tr');
      goalRow.id = 'goalRow' + goalCount;

      goalRow.innerHTML = `
        <td><input type="text" class="form-control" placeholder="Enter goal name" id="goalName${goalCount}"></td>
        <td>
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="status${goalCount}">
            <label class="form-check-label" for="status${goalCount}">Off</label>
          </div>
        </td>
        <td>
          <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#frequencyModal" id="setFrequency${goalCount}">Set Frequency</button>
          <span id="frequencyDisplay${goalCount}"> - </span>
        </td>
        <td><button class="btn btn-danger btn-sm" onclick="removeGoal(${goalCount})">Remove</button></td>
      `;

      goalList.appendChild(goalRow);

      // Open frequency modal when "Set Frequency" button is clicked
      document.getElementById('setFrequency' + goalCount).addEventListener('click', function () {
        document.getElementById('frequencySelect').value = '2hr'; // default value
        document.getElementById('calendarPicker').style.display = 'none'; // hide calendar picker initially
      });

      // Show or hide the calendar picker based on frequency selection
      document.getElementById('frequencySelect').addEventListener('change', function () {
        const selectedFrequency = this.value;
        const calendarPicker = document.getElementById('calendarPicker');
        
        if (selectedFrequency === 'calendar') {
          calendarPicker.style.display = 'block'; // Show the calendar picker
        } else {
          calendarPicker.style.display = 'none'; // Hide the calendar picker
        }
      });

      // Set frequency when the user selects it
      document.getElementById('setFrequencyBtn').addEventListener('click', function () {
        const selectedFrequency = document.getElementById('frequencySelect').value;
        const goalId = goalCount;

        if (selectedFrequency === 'calendar') {
          const selectedDate = document.getElementById('calendarInput').value;
          document.getElementById('frequencyDisplay' + goalId).innerText = `On ${selectedDate}`;
        } else {
          document.getElementById('frequencyDisplay' + goalId).innerText = selectedFrequency;
        }

        frequencyModal.hide();
      });

      // Toggle Status Text (On/Off) when clicked
      const statusToggle = document.getElementById('status' + goalCount);
      const statusLabel = statusToggle.nextElementSibling; // Access label for status
      statusToggle.addEventListener('change', function () {
        if (statusToggle.checked) {
          statusLabel.textContent = 'On';
        } else {
          statusLabel.textContent = 'Off';
        }
      });
    });

    // Remove Goal Function
    window.removeGoal = function (goalId) {
      const goalRow = document.getElementById('goalRow' + goalId);
      goalRow.remove();
    };

    // Submit Goals Data
    function submitGoalsData() {
      const goalsData = [];
      for (let i = 1; i <= goalCount; i++) {
        const userId = 1;
        const goalName = document.getElementById('goalName' + i)?.value;
        const status = document.getElementById('status' + i)?.checked ? 1 : 0;
        const frequency = document.getElementById('frequencyDisplay' + i)?.innerText;
        
        if (goalName && frequency) {
          goalsData.push({
            userId: userId,
            goalName: goalName,
            status: status,
            frequency: frequency
          });
        }
      }

      fetch('save_goal.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({
          goalsData: goalsData
        })
      })
      .then(response => response.json())
      .then(data => {
        if (data.status === 'success') {
          alert('Data submitted successfully!');
        } else {
          alert('There was an error saving the data.');
        }
      })
      .catch(error => {
        console.error('Error:', error);
        alert('An error occurred while submitting the data.');
      });
    }

    // Example of adding a button to submit the data
    const submitButton = document.createElement('button');
    submitButton.classList.add('btn', 'btn-success', 'mt-3');
    submitButton.textContent = 'Submit Goals';
    submitButton.addEventListener('click', submitGoalsData);
    document.querySelector('.container').appendChild(submitButton);
  });
</script>

</body>
</html>
