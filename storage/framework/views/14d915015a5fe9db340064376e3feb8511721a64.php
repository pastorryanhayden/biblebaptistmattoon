<?php if(isset($event)): ?>
    <div class="home_event">
    <div class="content">
        <div class="details">
        <h4>Next Event</h4>
        <h3><?php echo e($event->title); ?></h3>
        <p class="dates"><?php echo e(\Carbon\Carbon::parse($event->start_date)->format('F j, Y')); ?> <?php if($event->end_date): ?>- <?php echo e(\Carbon\Carbon::parse($event->end_date)->format('F j, Y')); ?> <?php endif; ?></p>
        <p class="description"><?php echo e($event->description); ?></p>
        <a class="learn-more" href="/events/<?php echo e($event->slug); ?>">Learn More <?php echo $__env->make('partials.icons.chevright', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></a>
        </div>
     
        <?php if($event->photo): ?>
            <img src="<?php echo e(asset('storage/'. $event->photo)); ?>" alt="<?php echo e($event->title); ?>">
        <?php else: ?>
            <img src="/images/placeholder.jpg" alt="placeholder image">
        <?php endif; ?>

</div>
    </div>
<?php endif; ?>  <?php /**PATH /Users/ryanhayden/Herd/biblebaptistmattoon/resources/views/partials/_event.blade.php ENDPATH**/ ?>