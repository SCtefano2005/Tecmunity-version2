<x-dashboard>

    <div class="container">
        <header>
            <h1>CRUD Mostrar</h1>
        </header>
        <main>
            <section class="table-section">
                <h2>Items List</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="items-list">
                        <!-- Items will be dynamically added here -->
                        <tr>
                            <td>Item 1</td>
                            <td>Description for item 1</td>
                            <td class="action-buttons">
                                <button class="edit">Edit</button>
                                <button class="delete">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Item 2</td>
                            <td>Description for item 2</td>
                            <td class="action-buttons">
                                <button class="edit">Edit</button>
                                <button class="delete">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </main>
    </div>

</x-dashboard>