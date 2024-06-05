<template>
    <div class="flex min-h-full flex-col pt-10 px-6 lg:px-8 h-screen bg-gray-600">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-60 w-auto" src="../assets/fop8nbg.png" alt="Your Company">
            <h2 class="text-center text-2xl font-bold leading-9 tracking-tight text-green-600">Create a new
                account</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="#" method="POST">
                <div>
                    <label for="username" class="block text-sm font-medium leading-6 text-green-300">Username</label>
                    <div class="mt-2">
                        <input id="username" name="username" type="username" autocomplete="username" required
                            class="block w-full bg-gray-400 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password"
                            class="block text-sm font-medium leading-6 text-green-300">Password</label>
                        <div class="text-sm">
                            <a href="#" class="font-semibold text-green-600 hover:text-green-400">Forgot password?</a>
                        </div>
                    </div>
                    <div class="mt-2">
                        <input id="password" name="password" type="password" autocomplete="current-password" required
                            class="block w-full bg-gray-400 border-gray rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <button type="submit" class="flex w-full justify-center rounded-md bg-green-400 px-3 py-1.5 text-sm font-semibold
                        leading-6 text-gray-800 shadow-sm hover:bg-green-600 focus-visible:outline focus-visible:outline-2 
                        focus-visible:outline-offset-2 focus-visible:outline-green-600">
                        Register
                    </button>
                </div>
            </form>

            <p class="mt-10 text-center text-sm text-green-300">
                Already have an account?
                <a href="#" class="font-semibold leading-6 text-green-600 hover:text-green-400">Log in</a>
            </p>
        </div>
    </div>
</template>

<script>
export default {
    name: "RegisterComp"
}
</script>