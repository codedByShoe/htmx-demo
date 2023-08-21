<input type="text" class="border {{ $name ? 'border-red-500' : '' }} rounded p-2 shadow" name="name"
    placeholder="Name" />
<p class="text-sm text-red-500">{{ $name }}</p>
<input type="text" class="border {{ $email ? 'border-red-500' : '' }} rounded p-2 shadow" name="email"
    placeholder="Email" />
<p class="text-sm text-red-500">{{ $email }}</p>
<button type="submit" class="bg-gray-800 rounded font-semibold text-white px-4 py-2">Submit</button>
