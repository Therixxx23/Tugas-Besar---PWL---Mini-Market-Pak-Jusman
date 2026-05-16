<x-app-layout>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Notifikasi</h1>

        @forelse(auth()->user()->notifications as $notification)
            <div class="bg-white p-4 rounded shadow mb-3">
                <p>{{ $notification->data['message'] }}</p>

                @if($notification->read_at)
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-red-600 text-sm">
                            Belum dibaca
                        </span>

                        <a href="/notifications/read/{{ $notification->id }}"
                        class="text-blue-600 text-sm hover:underline">
                            Tandai Dibaca
                        </a>
                    </div>
                @else
                    <span class="text-red-600 text-sm">
                        Belum dibaca
                    </span>
                @endif
            </div>
        @empty
            <div class="bg-white p-4 rounded shadow">
                Tidak ada notifikasi
            </div>
        @endforelse
    </div>
</x-app-layout>