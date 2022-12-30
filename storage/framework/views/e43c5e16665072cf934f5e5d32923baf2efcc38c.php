<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
</head>
<body>
<div class="w-4/5 mx-auto">
    <div class="text-center pt-20">
        <h1 class="text-3xl text-gray-700">
            Add new expert
        </h1>
        <hr class="border border-1 border-gray-300 mt-10">
    </div>

<div class="m-auto pt-20">

      
      <div class="pb-8">
        <?php if($errors->any()): ?>
        <div class="bg-red-500 text-white font-bold  rounded-t px-4 py-2">
          something went wrong ....
        </div>
        <ul class="border border-t-0 border-red-100 px-4 py-3 text-red-700">
            <?php $__currentLoopData = $errors->any; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                <?php echo e($error); ?>

            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <?php endif; ?>
      </div>



    <form
        action="<?php echo e(route('blog.store')); ?>"
        method="POST"
        enctype="multipart/form-data">
        <?php echo csrf_field(); ?>


        <input
            type="text"
            name="name"
            placeholder="Name..."
            class="bg-transparent block border-b-2 w-full h-20 text-2xl outline-none">

        <input
            type="text"
            name="experience"
            placeholder="Experience..."
            class="bg-transparent block border-b-2 w-full h-20 text-2xl outline-none">

            <input
            type="number"
            name="available_time"
            placeholder="Available time in the day..."
            class="bg-transparent block border-b-2 w-full h-20 text-2xl outline-none">

            <input
            type="number"
            name="rank"
            placeholder="Rank..."
            class="bg-transparent block border-b-2 w-full h-20 text-2xl outline-none">

        <textarea
            name="info"
            placeholder="Info..."
            class="py-20 bg-transparent block border-b-2 w-full h-60 text-xl outline-none"></textarea>

        <div class="bg-grey-lighter py-10">
            <label class="w-44 flex flex-col items-center px-2 py-3 bg-white-rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer">
                    <span class="mt-2 text-base leading-normal">
                        Select a file
                    </span>
                <input
                    type="file"
                    name="image"
                    class="hidden">
            </label>
        </div>

        <button
            type="submit"
            class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
            Submit expert
        </button>
    </form>
</div>
</body>
</html>
<?php /**PATH C:\Users\LENOVO\Desktop\laraveltake6\AD\resources\views/blog/create.blade.php ENDPATH**/ ?>