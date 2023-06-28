<x-maz-sidebar :href="route('dashboard')" :logo="asset('images/logo/logo.png')">

    <!-- Add Sidebar Menu Items Here -->

    <x-maz-sidebar-item name="Dashboard" :link="route('dashboard')" icon="bi bi-grid-fill"></x-maz-sidebar-item>
    <x-maz-sidebar-item name="Penjualan" :link="route('penjualan')" icon="bi bi-grid-fill"></x-maz-sidebar-item>
    <x-maz-sidebar-item name="Component" icon="bi bi-stack">
        <x-maz-sidebar-sub-item name="Accordion" :link="route('components.accordion')"></x-maz-sidebar-sub-item>
        <x-maz-sidebar-sub-item name="Alert" :link="route('components.alert')"></x-maz-sidebar-sub-item>
        <x-maz-sidebar-sub-item name="Badge" :link="route('components.badge')"></x-maz-sidebar-sub-item>
        <x-maz-sidebar-sub-item name="Button" :link="route('components.button')"></x-maz-sidebar-sub-item>
    </x-maz-sidebar-item>
    <x-maz-sidebar-item name="MoreComponent" icon="bi bi-stack">
        <x-maz-sidebar-sub-item name="sweetalert" :link="route('components.sweetalert')"></x-maz-sidebar-sub-item>
        <x-maz-sidebar-sub-item name="dropdown" :link="route('components.dropdown')"></x-maz-sidebar-sub-item>
        <x-maz-sidebar-sub-item name="rating" :link="route('components.rating')"></x-maz-sidebar-sub-item>
    </x-maz-sidebar-item>
    <x-maz-sidebar-item name="Form Elements" icon="hexagon-fill">
        <x-maz-sidebar-sub-item name="formlayout" :link="route('components.formlayout')"></x-maz-sidebar-sub-item>
        <x-maz-sidebar-sub-item name="formvalidation" :link="route('components.formvalidation')"></x-maz-sidebar-sub-item>
    </x-maz-sidebar-item>
    <x-maz-sidebar-item name="Charts" icon="hexagon-fill">
        <x-maz-sidebar-sub-item name="ChartJS" :link="route('components.chartjs')"></x-maz-sidebar-sub-item>
        <x-maz-sidebar-sub-item name="apexcharts" :link="route('components.apexcharts')"></x-maz-sidebar-sub-item>
    </x-maz-sidebar-item>

</x-maz-sidebar>