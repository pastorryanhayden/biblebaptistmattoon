<div class="relative isolate overflow-hidden pt-14">
    <img src="<?php echo e(Storage::disk('vultr')->url($settings->header_image)); ?>" alt="" class="absolute inset-0 -z-20 h-full w-full object-cover">
    <?php if($settings->header_video): ?>
    <video id="video" autoplay muted loop playsinline poster="/storage/<?php echo e($settings->header_image); ?>" class="absolute inset-0 -z-20 h-full w-full object-cover">
      <source src="<?php echo e(Storage::disk('vultr')->url($settings->header_video)); ?>" type="video/mp4">
        
      </video>
      <script>
        document.getElementById('video').play();
    </script>
    <?php endif; ?>
    <div class="absolute inset-0 -z-10 overflow-hidden bg-black opacity-30" aria-hidden="true"></div>
    <div class="mx-auto max-w-2xl py-32 sm:py-48 lg:py-56">
      
      <div class="text-center">
        <h1 class="text-3xl tracking-tight text-white sm:text-6xl"><?php echo e($settings->heading); ?></h1>
        
       
      </div>
    </div>
    <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]" aria-hidden="true">
      <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-20 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
    </div>
  </div><?php /**PATH /Users/ryanhayden/Herd/examplesite/resources/views/livewire/home/hero.blade.php ENDPATH**/ ?>