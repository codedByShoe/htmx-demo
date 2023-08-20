<?php foreach ($posts as $post) : ?>
    <div class="bg-gray-200 rounded p-4 mt-2">
        <h2 class="text-lg font-semibold text-center"><?= $post['title']; ?></h2>
        <p class="text-center"><?= $post['body'] ?></p>
    </div>
<?php endforeach; ?>