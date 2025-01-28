import React, { useEffect, useState } from 'react';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/inertia-react';

const Table = () => {
  const [products, setProducts] = useState([]);
  const [loading, setLoading] = useState(true);

  // ดึงข้อมูลจาก API
  useEffect(() => {
    fetch('/products')  // แก้ไขเป็น URL ที่ถูกต้องตาม Controller
      .then((response) => response.json())
      .then((data) => {
        setProducts(data.data);
        setLoading(false);
      })
      .catch((error) => {
        console.error("Error fetching products:", error);
        setLoading(false);
      });
  }, []);

  if (loading) return <div>Loading...</div>;

  return (
    <AuthenticatedLayout
      header={
        <h2 className="text-xl font-semibold leading-tight text-gray-800">
          Product Table
        </h2>
      }
    >
      <Head title="Product Table" />

      {/* ตารางแสดงข้อมูลสินค้า */}
      <div className="mt-6">
        <table className="table-auto w-full border-collapse">
          <thead>
            <tr>
              <th className="px-4 py-2 text-left">Name</th>
              <th className="px-4 py-2 text-left">Price</th>
              <th className="px-4 py-2 text-left">Stock</th>
            </tr>
          </thead>
          <tbody>
            {products.map((product) => (
              <tr key={product.id} className="border-b">
                <td className="px-4 py-2">{product.name}</td>
                <td className="px-4 py-2">{product.price}</td>
                <td className="px-4 py-2">{product.stock}</td>
              </tr>
            ))}
          </tbody>
        </table>
      </div>
    </AuthenticatedLayout>
  );
};

export default Table;
