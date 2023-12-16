<?php require base_path("views/partials/head.php") ?>
<?php require base_path("views/partials/nav.php") ?>

<main>
	<div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
		<!--
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
	<h2 class="text-2xl font-bold text-center mb-6">Register now</h2>
	
		<form method="POST" action="/register" class="max-w-lg mx-auto ">
			<div class="space-y-12 flex justify-center">
				<div class="border-b border-gray-900/10 pb-12 w-full">
				
					<div >
						<label for="email" class="block text-sm font-medium leading-6 text-gray-900" >Email: </label>
						<div class="mt-2">
							<input required type="email" value="<?= old('email'); ?>" id="email" name="email" class="w-full block rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
							<?php if (isset($errors['email'])): ?>
								<p class="text-red-500 text-xs mt-2"><?= $errors['email'] ?></p>
							<?php endif; ?>
						</div>
					</div>
					
					<div >
						<label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password: </label>
						<div class="mt-2">
							<input required type="password" id="password" name="password" class="w-full block rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
							<?php if (isset($errors['password'])): ?>
								<p class="text-red-500 text-xs mt-2"><?= $errors['password'] ?></p>
							<?php endif; ?>
						</div>
					</div>
					
				</div>
				
			</div>

			<div class="mt-6 flex items-center justify-end gap-x-6">
				<a class="text-sm font-semibold leading-6 text-gray-900" href="/notes">Cancel</a>
				<button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
			</div>
		</form>

	</div>
</main>

<?php require base_path('views/partials/footer.php') ?>