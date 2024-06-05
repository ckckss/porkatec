<template>
    <div class="min-h-screen flex flex-row sm:justify-center items-center sm:pt-0 bg-gray-700">
        <div>
            <slot name="logo" />            
        </div>

        <div class="w-full sm:max-w-prose mt-6 px-6 py-8 bg-gray-600 shadow-md overflow-hidden sm:rounded-lg">
            <slot class="mb-8" name="title" />
            <slot name="content" />
        </div>
    </div>
</template>
