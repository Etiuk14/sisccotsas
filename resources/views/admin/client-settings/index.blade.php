<div>
    <h2 class="text-xl font-bold mb-4">Configuración de Clientes</h2>
    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2">Cliente</th>
                <th class="py-2">Zona Horaria</th>
                <th class="py-2">Idioma</th>
                <th class="py-2">Formato de Moneda</th>
                <th class="py-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($settings as $setting)
            <tr>
                <td class="py-2">{{ $setting->client->name }}</td>
                <td class="py-2">{{ $setting->timezone }}</td>
                <td class="py-2">{{ $setting->language }}</td>
                <td class="py-2">{{ $setting->currency_format }}</td>
                <td class="py-2">
                    <a href="{{ route('admin.client-settings.edit', $setting->id) }}" class="bg-yellow-500 text-white py-1 px-2 rounded">Editar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>