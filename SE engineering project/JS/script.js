let commentBtn = document.getElementById('getform');
commentBtn.addEventListener('click', sendComment);
viewComment();

function formatDate(date) {
    var t = date.split(/[- :]/);
    var d = new Date(t[0], t[1] - 1, t[2], t[3], t[4]);
    return d;
}

function sendComment() {
    var comment = document.getElementById('user_comment').value;
    var id = document.querySelector('.product').getAttribute('id');
    var userId = document.querySelector('.getUserId').getAttribute('id');
    var xhr = new XMLHttpRequest();
    // +'&userId=' + userId
    xhr.open('GET', 'includes/data_to_db.php?id=' + id + '&comment=' + comment + '&userId=' + userId, true);
    xhr.send();
    viewComment();

};

function viewComment() {
    var id = document.querySelector('.product').getAttribute('id');

    var reviews = document.querySelector('.reviews');
    let xhr = new XMLHttpRequest();
    xhr.open('GET', 'includes/view-comments.php?id=' + parseInt(id, 10), true);

    xhr.onload = function () {
        if (this.status == 200) {
            reviews.innerHTML = "";
            console.log(this.responseText);
            let posts = JSON.parse(this.responseText);
            let output = '';
            for (var i in posts) {

                output = '<div class="view-comment"><div class = "upper-info d-flex" > <h4>' + posts[i].username + '</h4> <span>' + formatDate(posts[i].comment_date).toDateString() + '</span> </div> <p> ' + posts[i].comment_content + ' </p> </div>';

                reviews.innerHTML += output;
            }

        }
    }
    xhr.send();

}