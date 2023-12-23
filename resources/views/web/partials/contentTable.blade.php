<div class="flex flex-col mt-6 my-4">
    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
            <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-800">
                    <tr>
                        <th scope="col"
                            class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            Assunto
                        </th>

                        <th scope="col"
                            class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            Status
                        </th>

                        <th scope="col"
                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            Comentário
                        </th>

                        <th scope="col"
                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            Interações
                        </th>

                        <th scope="col" class="relative py-3.5 px-4">
                            <span class="sr-only">Ver</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                    @foreach ($forums->itemsData() as $forum)
                        <tr>
                            <td class="px-4 py-2 text-sm font-medium whitespace-nowrap dark:text-white">
                                {{ $forum->subject }}
                            </td>
                            <td class="px-12 py-2 text-sm font-medium whitespace-nowrap">
                                <x-status-forum :status="$forum->status"></x-status-forum>
                            </td>
                            <td class="px-4 py-2 text-sm whitespace-nowrap text-gray-500 dark:text-gray-400">
                                {{ $forum->body }}
                            </td>
                            <td class="px-4 py-2 text-sm whitespace-nowrap">
                                <div class="flex items-center">
                                    <img class="object-cover w-8 h-8 -mx-1 border-2 border-white rounded-full dark:border-gray-700 shrink-0 bg-green-500"
                                         src="https://media.istockphoto.com/id/1437816897/pt/foto/business-woman-manager-or-human-resources-portrait-for-career-success-company-we-are-hiring-or.jpg?s=2048x2048&w=is&k=20&c=mkmHzbsIlTMJCGDlBD4PAP5MmCaRD05baBA9ECQMGo4=" alt="" />
                                    <img class="object-cover w-8 h-8 -mx-1 border-2 border-white rounded-full dark:border-gray-700 shrink-0 bg-green-500"
                                         src="https://images.unsplash.com/photo-1522512115668-c09775d6f424?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="" />
                                    <img class="object-cover w-8 h-8 -mx-1 border-2 border-white rounded-full dark:border-gray-700 shrink-0 bg-green-500"
                                         src="https://images.unsplash.com/photo-1496340672773-0b29c9b17ed2?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="" />
                                    <p class="flex items-center justify-center w-8 h-8 -mx-1 text-xs text-blue-600 bg-blue-100 border-2 border-white rounded-full">+5</p>
                                </div>
                            </td>

                            <td class="px-4 py-2 text-sm whitespace-nowrap flex">
                                <a href="{{ route('web.edit', $forum->id) }}" class="px-1 py-1 text-gray-500 transition-colors duration-200 rounded-lg">
                                    Editar
                                </a>
                                <a href="{{ route('web.show', $forum->id) }}"
                                   class="px-1 py-1 text-gray-500 transition-colors duration-200 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"/>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
