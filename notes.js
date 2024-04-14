  function updateBranches(triggerId = "semester") {
  var semester = document.getElementById(triggerId).value;
  var branchSelectId = triggerId === "semester" ? "branch" : "modal-branch";
  var branchSelect = document.getElementById(branchSelectId);

  // Clear existing options
  branchSelect.innerHTML = "<option value=''>Select Branch</option>";

  // Define branches for each semester
  var branches = {
    sem1: ["Group P", "Group C"],
    sem2: ["Group P", "Group C"],
    sem3: ["Comps", "IT", "Excp", "Extc"],
    sem4: ["Comps", "IT", "Excp", "Extc"],
    sem5: ["Comps", "IT", "Excp", "Extc"],
    sem6: ["Comps", "IT", "Excp", "Extc"],
    sem7: ["Comps", "IT", "Excp", "Extc"],
    sem8: ["Comps", "IT", "Excp", "Extc"],
    // Add more semesters and their branches as needed
  };

  // Check if semester is selected
  if (semester) {
    var semesterBranches = branches[semester];
    if (semesterBranches) {
      semesterBranches.forEach(function (branch) {
        var option = document.createElement("option");
        option.value = branch;
        option.text = branch;
        branchSelect.appendChild(option);
      });
    }
  }
}

function updatesubject(triggerId = "branch") {
  var semesterSelectId = triggerId.startsWith("modal-") ? "modal-semester" : "semester";
  var semester = document.getElementById(semesterSelectId).value;
  var branchSelectId = triggerId.startsWith("modal-") ? "modal-branch" : "branch";
  var branch = document.getElementById(branchSelectId).value;
  var subjectSelectId = triggerId.startsWith("modal-") ? "modal-subject" : "subject";
  var subjectSelect = document.getElementById(subjectSelectId);

  // Clear existing options
  subjectSelect.innerHTML = "<option value=''>Select Subject</option>";

  // Define subject based on semester and branch
  var subject = {
    sem1: {
      "Group P": [
        "Applied Mathematics - I",
        "Engineering Physics",
        "Engineering Mechanics",
      ],
      "Group C": [
        "Applied Mathematics - I",
        "Engineering Chemistry",
        "Elements of Electrical & Electronics Engineering",
        "Engineering Drawing",
      ],
    },
    sem2: {
      "Group P": [
        "Applied Mathematics - II",
        "Engineering Chemistry",
        "Elements of Electrical & Electronics Engineering",
        "Engineering Drawing",
      ],
      "Group C": [
        "Applied Mathematics - II",
        "Engineering Physics",
        "Engineering Mechanics",
      ],
    },
    sem3: {
      "Comps": ["ITVC", "Data Structures", "COA", "DSM"],
      "IT": ["DAM", "Data Structures", "DBMS", "Digital Systems"],
      "Excp": ["ITVC", "Data Structures", "Digital Electronics", "Analog Electronic Circuits"],
      "Extc": ["Mathematics for Communication Engineering-I", "Basic Electronic Circuits", "Electrical Network Theory", "Digital Logic Design"],
    },
    sem4: {
      "Comps": ["PSOT", "AOA", "TAC", "RDBMS"],
      "IT": ["PSOT", "AOA", "Advanced Databases", "Information Theory and Coding"],
      "Excp": ["Complex Analysis, Statistics, and Optimization Techniques", "AOA", "DBMS", "DSM"],
      "Extc": ["Mathematics for Communication Engineering-II", "Analog Electronics", "Signals and Systems ", "Communication Systems"],
    },
    sem5: {
    "Comps": ["Subject 1", "Subject 2", "Subject 3", "Subject 4"],
    "IT": ["Subject 1", "Subject 2", "Subject 3", "Subject 4"],
    "Excp": ["Subject 1", "Subject 2", "Subject 3", "Subject 4"],
    "Extc": ["Subject 1", "Subject 2", "Subject 3", "Subject 4"],
    },
    sem6: {
    "Comps": ["Subject 1", "Subject 2", "Subject 3", "Subject 4"],
    "IT": ["Subject 1", "Subject 2", "Subject 3", "Subject 4"],
    "Excp": ["Subject 1", "Subject 2", "Subject 3", "Subject 4"],
    "Extc": ["Subject 1", "Subject 2", "Subject 3", "Subject 4"],
    },
    sem7: {
    "Comps": ["Subject 1", "Subject 2", "Subject 3", "Subject 4"],
    "IT": ["Subject 1", "Subject 2", "Subject 3", "Subject 4"],
    "Excp": ["Subject 1", "Subject 2", "Subject 3", "Subject 4"],
    "Extc": ["Subject 1", "Subject 2", "Subject 3", "Subject 4"],
    },
    sem8: {
    "Comps": ["Subject 1", "Subject 2", "Subject 3", "Subject 4"],
    "IT": ["Subject 1", "Subject 2", "Subject 3", "Subject 4"],
    "Excp": ["Subject 1", "Subject 2", "Subject 3", "Subject 4"],
    "Extc": ["Subject 1", "Subject 2", "Subject 3", "Subject 4"],
    },
  };

  // Check if both semester and branch are selected
  if (semester && branch) {
    var branchsubject = subject[semester][branch];
    if (branchsubject) {
      branchsubject.forEach(function (subject) {
        var option = document.createElement("option");
        option.value = subject;
        option.text = subject;
        subjectSelect.appendChild(option);
      });
    }
  }
}

 // Function to handle voting
function handleVote(noteId, voteType) {
  $.ajax({
      type: "POST",
      url: "resource_manager.php",
      data: { noteId: noteId, voteType: voteType, action: "vote" },
      success: function (response) {
          if (response.success) {
              displayNotes(); // Refresh the notes display
          } else {
              alert("Failed to update vote count.");
          }
      },
      error: function (xhr, status, error) {
          alert("An error occurred while updating the vote count.");
      },
      dataType: "json"
  });
}

$(document).ready(function () {
    $(".btn-submit").click(function () {
        const semester = $("#semester").val();
        const branch = $("#branch").val();
        const subject = $("#subject").val();
        loadNotes(semester, branch, subject);
    });

    function loadNotes(semester, branch, subject) {
        $.get(
            "resource_manager.php",
            { semester, branch, subject },
            (notes) => {
                $(".notes-grid").empty();
                notes.forEach((note) => {
                    const noteCard = createNoteCard(note);
                    $(".notes-grid").append(noteCard);
                });
            },
            "json"
        );
    }

    function createNoteCard(note) {
        const noteCard = $("<div>").addClass("note-card");

        $("<h4>").text(note.title).appendTo(noteCard);
        $("<p>").text(note.description).appendTo(noteCard);

        const meta = $("<div>").addClass("meta");
        $("<div>")
            .text(`Semester: ${note.semester}, Branch: ${note.branch}`)
            .appendTo(meta);

        const votesDiv = $("<div>").addClass("votes");
        const upvoteButton = $("<button>")
            .addClass("btn", "btn-outline")
            .text(`Upvotes: ${note.upvotes}`)
            .attr("data-note-id", note.id) // Set the data-note-id attribute
            .click(() => handleVote(note.id, "upvote"))
            .appendTo(votesDiv);
        const downvoteButton = $("<button>")
            .addClass("btn", "btn-outline")
            .text(`Downvotes: ${note.downvotes}`)
            .attr("data-note-id", note.id) // Set the data-note-id attribute
            .click(() => handleVote(note.id, "downvote"))
            .appendTo(votesDiv);

        const tagsDiv = $("<div>").addClass("tags");
        note.tags.forEach((tag) => {
            $("<div>").addClass("tag").text(tag).appendTo(tagsDiv);
        });

        const downloadBtn = $("<button>")
            .addClass("btn")
            .text("Download")
            .click(() => downloadResource(note.file_path));

        meta.append(votesDiv);
        noteCard.append(meta, tagsDiv, downloadBtn);

        return noteCard;
    }

    function downloadResource(filePath) {
        window.location.href = filePath;
    }
});

// Function to display notes
function displayNotes() {
 const semester = $("#semester").val();
 const branch = $("#branch").val();
 const subject = $("#subject").val();
 const sortBy = sortBySelect.val();

 $.get(
    "resource_manager.php",
    { semester, branch, subject },
    (notes) => {
      notesGrid.empty();

      notes.sort((a, b) => {
        if (sortBy === "upvotes-desc") {
          return b.upvotes - a.upvotes;
        } else if (sortBy === "upvotes-asc") {
          return a.upvotes - b.upvotes;
        } else {
          return 0;
        }
      });

      notes.forEach((note) => {
        const noteCard = createNoteCard(note);
        notesGrid.append(noteCard);
      });
    },
    "json"
 );
}


$(document).ready(function () {
  const postResourcesBtn = $("#postResourcesBtn");
  const closeModalBtn = $("#closeModalBtn");
  const modal = $(".modal");
  const notesGrid = $(".notes-grid");
  const sortBySelect = $("#sortBy");
  const successMessage = $("#success-message");

  // Event listeners
  postResourcesBtn.click(() => {
    modal.removeClass("hidden");
  });

  closeModalBtn.click(() => {
    modal.addClass("hidden");
    successMessage.addClass("hidden");
  });

  $(".modal form").submit(function (e) {
    e.preventDefault();

    $.ajax({
      type: "POST",
      url: "resource_manager.php",
      data: new FormData(this),
      contentType: false,
      processData: false,
      success: function (response) {
        successMessage.removeClass("hidden");
        setTimeout(function () {
          successMessage.addClass("hidden");
        }, 3000); // Hide the message after 3 seconds
        modal.addClass("hidden");
        displayNotes(); // Refresh the notes display
      },
      error: function (xhr, status, error) {
        alert("An error occurred while uploading the resource.");
      },
    });
  });

  sortBySelect.change(displayNotes);

  $(".votes .btn").off("click").on("click", function () {
    const noteId = $(this).data("note-id");
    const voteType = $(this).text().includes("Upvotes") ? "upvote" : "downvote";
    handleVote(noteId, voteType);
  });

  // Initial note display
  displayNotes();
});
