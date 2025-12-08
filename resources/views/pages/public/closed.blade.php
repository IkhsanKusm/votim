<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Activity Closed - Vot.ai</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>body { font-family: sans-serif; background: #0B0F19; color: #fff; }</style>
</head>
<body class="h-screen flex flex-col items-center justify-center text-center p-4">
    <div class="p-8 rounded-2xl bg-white/5 border border-white/10 max-w-md w-full">
        <div class="w-16 h-16 bg-red-500/10 text-red-500 rounded-full flex items-center justify-center mx-auto mb-4">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
        </div>
        <h1 class="text-xl font-bold mb-2">Activity Closed</h1>
        <p class="text-gray-400 mb-6">"{{ $activity->title }}" is no longer accepting responses.</p>
        <a href="/" class="px-6 py-2 bg-white/10 hover:bg-white/20 rounded-lg transition text-sm">Go Home</a>
    </div>
</body>
</html>
