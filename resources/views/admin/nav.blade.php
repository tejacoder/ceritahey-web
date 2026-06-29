<div class="mb-8 overflow-x-auto pb-2">
  <div class="flex items-center gap-2 p-1.5 bg-stone-100/80 rounded-xl w-fit border border-stone-200/60">
    <a href="{{ route('admin.dashboard') }}" class="px-4 py-2 rounded-lg text-sm font-bold transition-colors whitespace-nowrap {{ request()->routeIs('admin.dashboard') ? 'bg-white el-1 text-amber-600' : 'text-stone-500 hover:text-stone-900 hover:bg-stone-200/50' }}">
      Dashboard
    </a>
    <a href="{{ route('admin.products.index') }}" class="px-4 py-2 rounded-lg text-sm font-bold transition-colors whitespace-nowrap {{ request()->routeIs('admin.products.*') ? 'bg-white el-1 text-amber-600' : 'text-stone-500 hover:text-stone-900 hover:bg-stone-200/50' }}">
      Produk
    </a>
    <a href="{{ route('admin.orders.index') }}" class="px-4 py-2 rounded-lg text-sm font-bold transition-colors whitespace-nowrap {{ request()->routeIs('admin.orders.*') ? 'bg-white el-1 text-amber-600' : 'text-stone-500 hover:text-stone-900 hover:bg-stone-200/50' }}">
      Pesanan
    </a>
  </div>
</div>
