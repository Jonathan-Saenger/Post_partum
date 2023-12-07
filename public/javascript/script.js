document.addEventListener('DOMContentLoaded', function () {
    const categorieSelect = document.getElementById('categorie-select');
    const searchButton = document.querySelector('.filtre button');
    const postContainer = document.querySelector('.post');

    searchButton.addEventListener('click', function () {
        const selectedCategory = categorieSelect.value;
        const filteredPosts = filterPosts(selectedCategory);
        displayPosts(filteredPosts);
    });

    function filterPosts(category) {
        if (!category) {
            return Array.from(postContainer.children);
        }

        const filteredPosts = Array.from(postContainer.children).filter(function (post) {
            const postCategory = post.querySelector('.article_post h3').textContent.trim();
            return postCategory === category;
        });

        return filteredPosts;
    }

    function displayPosts(posts) {
        Array.from(postContainer.children).forEach(function (post) {
            post.style.display = 'none';
        });

        posts.forEach(function (post) {
            post.style.display = 'block';
        });
    }
});
