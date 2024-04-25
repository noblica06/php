<?php if (empty($data['comments'])): ?>
    <p class="lead mt-3">There is no comments waiting for approval</p>
<?php endif; ?>

<form method="POST" action="/php/public/admin/approveComments" class="mt-4 w-100">
    <?php foreach ($data['comments'] as $item): ?>
        <div class="card my-3 w-75">
            <div class="card-header mt-2">
                <input type='checkbox' name='approvedComments[]' value="${item->id}"> 
            </div>
            <div class="card-body text-center">
                <?php echo $item->body; ?>
                <div class="text-secondary mt-2">By <?php echo $item->name; ?></div>
            </div>
    </div>
    <?php endforeach; ?>
    <div class="mb-3">
        <input type="submit" name="submit" value="Send" class="btn btn-dark w-75">
    </div>
</form>