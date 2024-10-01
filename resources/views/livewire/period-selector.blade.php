<div class="flex"
    x-data="{
        setPeriod(period) {
            let query = new URLSearchParams(window.location.search)
            if (period === '1_hour') {
                query.delete('period')
            } else {
                query.set('period', period)
            }

            window.location = `${location.pathname}?${query}`
        }
    }"
>
    @foreach(array_keys($periods) as $period)
        <button @click="setPeriod('{{ $period }}')" class="p-1 font-semibold sm:text-lg {{ $current === $period ? 'text-gray-700 dark:text-gray-300' : 'text-gray-300 dark:text-gray-600 hover:text-gray-400 dark:hover:text-gray-500'}}">{{ $period }}</button>
    @endforeach
</div>
