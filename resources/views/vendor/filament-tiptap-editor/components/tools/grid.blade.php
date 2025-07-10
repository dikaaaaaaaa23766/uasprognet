@props([
    'editor' => null,
])

@php
    $layouts = $editor->getGridLayouts();
@endphp

<x-filament-tiptap-editor::dropdown-button
    label="{{ __('filament-tiptap-editor::editor.grid.label') }}"
    active="grid"
    icon="grid"
>
    @if (in_array('two-columns', $layouts))
        <x-filament-tiptap-editor::dropdown-button-item
            action="editor().chain().focus().insertGrid({ cols: 2 }).run()"
        >
            {{ __('filament-tiptap-editor::editor.grid.two_columns') }}
        </x-filament-tiptap-editor::dropdown-button-item>
    @endif

    @if (in_array('three-columns', $layouts))
        <x-filament-tiptap-editor::dropdown-button-item
            action="editor().chain().focus().insertGrid({ cols: 3 }).run()"
        >
            {{ __('filament-tiptap-editor::editor.grid.three_columns') }}
        </x-filament-tiptap-editor::dropdown-button-item>
    @endif

    @if (in_array('four-columns', $layouts))
        <x-filament-tiptap-editor::dropdown-button-item
            action="editor().chain().focus().insertGrid({ cols: 4 }).run()"
        >
            {{ __('filament-tiptap-editor::editor.grid.four_columns') }}
        </x-filament-tiptap-editor::dropdown-button-item>
    @endif

    @if (in_array('five-columns', $layouts))
        <x-filament-tiptap-editor::dropdown-button-item
            action="editor().chain().focus().insertGrid({ cols: 5 }).run()"
        >
            {{ __('filament-tiptap-editor::editor.grid.five_columns') }}
        </x-filament-tiptap-editor::dropdown-button-item>
    @endif

    @if (in_array('fixed-two-columns', $layouts))
        <x-filament-tiptap-editor::dropdown-button-item
            action="editor().chain().focus().insertGrid({ cols: 2, type: 'fixed' }).run()"
        >
            {{ __('filament-tiptap-editor::editor.grid.fixed_two_columns') }}
        </x-filament-tiptap-editor::dropdown-button-item>
    @endif

    @if (in_array('fixed-three-columns', $layouts))
        <x-filament-tiptap-editor::dropdown-button-item
            action="editor().chain().focus().insertGrid({ cols: 3, type: 'fixed' }).run()"
        >
            {{ __('filament-tiptap-editor::editor.grid.fixed_three_columns') }}
        </x-filament-tiptap-editor::dropdown-button-item>
    @endif

    @if (in_array('fixed-four-columns', $layouts))
        <x-filament-tiptap-editor::dropdown-button-item
            action="editor().chain().focus().insertGrid({ cols: 4, type: 'fixed' }).run()">
            {{ __('filament-tiptap-editor::editor.grid.fixed_four_columns') }}
        </x-filament-tiptap-editor::dropdown-button-item>
    @endif

    @if (in_array('fixed-five-columns', $layouts))
        <x-filament-tiptap-editor::dropdown-button-item
            action="editor().chain().focus().insertGrid({ cols: 5, type: 'fixed' }).run()"
        >
            {{ __('filament-tiptap-editor::editor.grid.fixed_five_columns') }}
        </x-filament-tiptap-editor::dropdown-button-item>
    @endif

    @if (in_array('asymmetric-left-thirds', $layouts))
        <x-filament-tiptap-editor::dropdown-button-item
            action="editor().chain().focus().insertGrid({ cols: 2, type: 'asymetric-left-thirds' }).run()"
        >
            {{ __('filament-tiptap-editor::editor.grid.asymmetric_left_thirds') }}
        </x-filament-tiptap-editor::dropdown-button-item>
    @endif

    @if (in_array('asymmetric-right-thirds', $layouts))
        <x-filament-tiptap-editor::dropdown-button-item
            action="editor().chain().focus().insertGrid({ cols: 2, type: 'asymetric-right-thirds' }).run()"
        >
            {{ __('filament-tiptap-editor::editor.grid.asymmetric_right_thirds') }}
        </x-filament-tiptap-editor::dropdown-button-item>
    @endif

    @if (in_array('asymmetric-left-fourths', $layouts))
        <x-filament-tiptap-editor::dropdown-button-item
            action="editor().chain().focus().insertGrid({ cols: 2, type: 'asymetric-left-fourths' }).run()"
        >
            {{ __('filament-tiptap-editor::editor.grid.asymmetric_left_fourths') }}
        </x-filament-tiptap-editor::dropdown-button-item>
    @endif

    @if (in_array('asymmetric-right-fourths', $layouts))
        <x-filament-tiptap-editor::dropdown-button-item
            action="editor().chain().focus().insertGrid({ cols: 2, type: 'asymetric-right-fourths' }).run()"
        >
            {{ __('filament-tiptap-editor::editor.grid.asymmetric_right_fourths') }}
        </x-filament-tiptap-editor::dropdown-button-item>
    @endif
</x-filament-tiptap-editor::dropdown-button>
