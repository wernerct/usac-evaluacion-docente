<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

class UsuariosTable extends DataTableComponent
{
    #protected $model = User::class; se quito el modelo porque lo queremos cargar con relaciones hasta abajo

    public function getSearchPlaceholder(): string
    {
        return 'Buscar usuarios...';
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        /* asi estaba
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Name", "name")
                ->sortable(),
            Column::make("Email", "email")
                ->sortable(),
            Column::make("Username", "username")
                ->sortable(),
            Column::make("Codigocatedratico", "codigocatedratico")
                ->sortable(),
            Column::make("Tipousuario", "tipousuario")
                ->sortable(),
            Column::make("Carrera", "carrera")
                ->sortable(),
            Column::make("Sede", "sede")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
        */
        return [
            Column::make('Codigo', 'Codigocatedratico'),
            Column::make('Usuario', 'Username'),
            BooleanColumn::make('Catedratico', 'tipousuario'),
            Column::make('Nombre', 'Name'),
            Column::make('Correo', 'Email'),
            ButtonGroupColumn::make('Action')
                ->buttons([
                    LinkColumn::make('Action')
                        ->title(fn () => 'Cargar Evaluacion')
                        ->location(fn ($row) => route('subirevaluacion', ['QCatedratico' => $row->id]))
                        ->attributes(fn () => ['class' => 'btn btn-blue']),/*btn-grad*/
                    LinkColumn::make('Action')
                        ->title(fn () => 'Reiniciar Clave')
                        ->location(fn ($row) => route('reset', ['QCatedratico' => $row->id]))
                        ->attributes(fn () => ['class' => 'btn btn-green'])
                ]),
        ];
    }
    public function builder(): Builder
    {
        return User::query();
        /*return User::query()
            ->with('username')
            ->select('users.username');*/
    }
}
