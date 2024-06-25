function validateCommentForm() {
  let name = document.getElementById('name').value;
  let comment = document.getElementById('comment').value;

  if (name === "") {
    alert("Name must be filled out");
    return false;
  }
  if (comment === "") {
    alert("Comment must be filled out");
    return false;
  }
  
  addComment(name, comment);
  return false; // Prevent form submission
}

function addComment(name, comment) {
  let commentsList = document.getElementById('commentsList');
  let commentDiv = document.createElement('div');
  commentDiv.classList.add('comment');
  
  let namePara = document.createElement('p');
  namePara.classList.add('comment-name');
  namePara.textContent = name;
  
  let commentPara = document.createElement('p');
  commentPara.classList.add('comment-text');
  commentPara.textContent = comment;
  
  commentDiv.appendChild(namePara);
  commentDiv.appendChild(commentPara);
  commentsList.appendChild(commentDiv);
}
