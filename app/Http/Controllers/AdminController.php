<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ErrorNotification;
use App\Models\Admin;
use App\Models\Module;
use App\Models\Permission;
use App\Models\Role;
use App\Models\Client;
use App\Models\Licencia;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.panel');
    }

    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    public function login(Request $request)
    {
        // Validar los datos de inicio de sesión
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.panel'); // Cambiado a 'admin.panel'
        }

        return back()->withErrors(['email' => 'Las credenciales no coinciden con nuestros registros.']);
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function panel()
    {
        return view('admin.panel');
    }

    public function clientes()
    {
        $clientes = Client::all();
        return view('admin.clientes', compact('clientes'));
    }

    public function bloquearCliente(Request $request, $id)
    {
        $cliente = Client::findOrFail($id);
        $cliente->bloqueado = $request->bloqueado;
        $cliente->save();

        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        $cliente = Client::findOrFail($id);
        // Lógica para eliminar la base de datos del cliente
        $cliente->delete();

        return redirect()->route('admin.clientes')->with('success', 'Cliente eliminado exitosamente.');
    }

    public function licencias()
    {
        $licencias = Licencia::all();
        return view('admin.licencias.index', compact('licencias'));
    }

    public function createLicencia()
    {
        return view('admin.licencias.create');
    }
    
    public function storeLicencia(Request $request)
    {
        $licencia = new Licencia();
        $licencia->nombre = $request->nombre;
        $licencia->precio = $request->precio;
        $licencia->almacenamiento = $request->almacenamiento;
        $licencia->descripcion = $request->descripcion;
        $licencia->duracion = $request->duracion;
        $licencia->cantidad_usuarios = $request->cantidad_usuarios;
        $licencia->modulos = json_encode($request->modulos);
        $licencia->limite_usuarios_clientes = $request->limite_usuarios_clientes;
        $licencia->limite_clientes = $request->limite_clientes;
        $licencia->limite_almacenamiento = $request->limite_almacenamiento;
        $licencia->save();

        return redirect()->route('admin.licencias');
    }

    public function publicidad()
    {
        return view('admin.publicidad');
    }

    public function usuarios()
    {
        return view('admin.usuarios');
    }

    public function logErrores()
    {
        return view('admin.logErrores');
    }

    public function seguimientoLicencias()
    {
        return view('admin.seguimientoLicencias');
    }

    public function auditorias()
    {
        return view('admin.auditorias');
    }

    public function profile()
    {
        return view('admin.profile');
    }

    public function updateProfile(Request $request)
    {
        $admin = Auth::guard('admin')->user();
        $admin->phone = $request->input('phone');
        $admin->position = $request->input('position');
        $admin->role = $request->input('role');
        if ($request->filled('password')) {
            $admin->password = Hash::make($request->input('password'));
        }
        $admin->save();

        return redirect()->route('admin.profile')->with('success', 'Datos actualizados correctamente.');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin');
    }

    public function createUser()
    {
        $roles = Role::all();
        $modules = Module::with('permissions')->get();
        return view('admin.users.create', compact('roles', 'modules'));
    }

    public function storeUser(Request $request)
    {
        $admin = Admin::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'document_number' => $request->input('document_number'),
            'phone' => $request->input('phone'),
            'position' => $request->input('position'),
            'password' => Hash::make($request->input('password')),
        ]);

        $admin->roles()->sync($request->input('roles', []));
        $admin->permissions()->sync($request->input('permissions', []));

        return redirect()->route('admin.usuarios')->with('success', 'Usuario creado correctamente.');
    }
    
    public function someAction()
    {
        // Lógica de la acción

        // Enviar notificación a Slack
        Notification::route('slack', config('services.slack.webhook_url'))
            ->notify(new ErrorNotification('Ha ocurrido un error en la aplicación'));

        return redirect()->back()->with('success', 'Acción realizada y notificación enviada.');
    }
}