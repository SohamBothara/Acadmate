document.addEventListener("DOMContentLoaded", function () {
  function disableButtons(buttons) {
    buttons.forEach(function (btn) {
      btn.disabled = true;
    });

    setTimeout(function () {
      buttons.forEach(function (btn) {
        btn.disabled = false;
      });
    }, 2000); // Adjust the delay as needed
  }

  // Function to handle like button click
  function handleLikeClick(button, response) {
    console.log("Like button clicked");

    var likeCountElement = response.querySelector(".like-count");
    var dislikeCountElement = response.querySelector(".dislike-count");

    var likeCount = parseInt(likeCountElement.textContent);
    var dislikeCount = parseInt(dislikeCountElement.textContent);

    if (!button.classList.contains("liked")) {
      likeCountElement.textContent = likeCount + 1;
      button.classList.add("liked");

      // If dislike button was previously clicked, decrement dislike count
      var dislikeButton = response.querySelector(".button--deny");
      if (dislikeButton.classList.contains("disliked")) {
        dislikeCountElement.textContent = dislikeCount - 1;
        dislikeButton.classList.remove("disliked");
      }
    } else {
      // If like button was previously clicked, decrement like count
      likeCountElement.textContent = likeCount - 1;
      button.classList.remove("liked");
    }

    // Disable buttons in the current response
    var currentLikeButtons = response.querySelectorAll(".button--approve");
    var currentDislikeButtons = response.querySelectorAll(".button--deny");
    disableButtons(currentLikeButtons);
    disableButtons(currentDislikeButtons);
  }

  // Function to handle dislike button click
  function handleDislikeClick(button, response) {
    console.log("Dislike button clicked");

    var likeCountElement = response.querySelector(".like-count");
    var dislikeCountElement = response.querySelector(".dislike-count");

    var likeCount = parseInt(likeCountElement.textContent);
    var dislikeCount = parseInt(dislikeCountElement.textContent);

    if (!button.classList.contains("disliked")) {
      dislikeCountElement.textContent = dislikeCount + 1;
      button.classList.add("disliked");

      // If like button was previously clicked, decrement like count
      var likeButton = response.querySelector(".button--approve");
      if (likeButton.classList.contains("liked")) {
        likeCountElement.textContent = likeCount - 1;
        likeButton.classList.remove("liked");
      }
    } else {
      // If dislike button was previously clicked, decrement dislike count
      dislikeCountElement.textContent = dislikeCount - 1;
      button.classList.remove("disliked");
    }

    // Disable buttons in the current response
    var currentLikeButtons = response.querySelectorAll(".button--approve");
    var currentDislikeButtons = response.querySelectorAll(".button--deny");
    disableButtons(currentLikeButtons);
    disableButtons(currentDislikeButtons);
  }

  // Event listener for like buttons
  document.querySelectorAll(".button--approve").forEach(function (button) {
    button.addEventListener("click", function () {
      var response = button.closest(".response");
      handleLikeClick(button, response);
    });
  });

  // Event listener for dislike buttons
  document.querySelectorAll(".button--deny").forEach(function (button) {
    button.addEventListener("click", function () {
      var response = button.closest(".response");
      handleDislikeClick(button, response);
    });
  });

  // Add event listener to comment symbols
  document.querySelectorAll(".button--flag").forEach(function (symbol) {
    symbol.addEventListener("click", function () {
      console.log("Comment button clicked");
      var commentForm = symbol
        .closest(".response")
        .querySelector(".comment-form");
      if (
        commentForm.style.display === "none" ||
        commentForm.style.display === ""
      ) {
        commentForm.style.display = "block";
      } else {
        commentForm.style.display = "none";
      }
    });
  });
});
document.addEventListener("DOMContentLoaded", function () {
  // Function to toggle display of comments section
  function toggleComments(commentSymbol) {
    var commentsSection = commentSymbol
      .closest(".response")
      .querySelector(".post__comments");
    commentsSection.style.display =
      commentsSection.style.display === "none" ||
      commentsSection.style.display === ""
        ? "block"
        : "none";
  }

  // Add event listener to comment symbols
  document.querySelectorAll(".button--flag").forEach(function (symbol) {
    symbol.addEventListener("click", function () {
      console.log("Comment button clicked");
      toggleComments(symbol);
    });
  });
});

document.addEventListener("DOMContentLoaded", function () {
  // Function to toggle display of new post popup
  function toggleNewPostPopup() {
    var newPostPopup = document.querySelector(".new-post-popup");
    if (
      newPostPopup.style.display === "none" ||
      newPostPopup.style.display === ""
    ) {
      newPostPopup.style.display = "block";
    } else {
      newPostPopup.style.display = "none";
    }
  }

  // Add event listener to new post button
  document
    .querySelector(".new-post-button")
    .addEventListener("click", function () {
      console.log("New Post button clicked");
      toggleNewPostPopup();
    });

  // Add event listener to cancel button in new post popup
  document
    .querySelector(".new-post-popup .cancel")
    .addEventListener("click", function () {
      console.log("Cancel button clicked");
      toggleNewPostPopup();
    });
});
